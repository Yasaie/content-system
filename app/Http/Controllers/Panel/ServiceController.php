<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\StoreService;
use App\Http\Requests\UpdateService;
use App\Models\Meta;
use App\Models\Service;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index(Request $request)
    {
		$search=$request->input('search');

		if(!empty($search)){
			$services=Service::where('title','like','%'.$search.'%')->with(['tags']);
		}else{
			$services=Service::with(['tags']);
		}

		return view('panel.service.index')->with(['services'=>$services->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreService $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreService $request)
    {
		$service=$request->except('user_id');

		if(!empty($service['publish']) && empty($service['published_at'])){
			$service['published_at']=Carbon::now();
		}

		//upload files
		if(!empty($request->file('media'))){
			$service['image']=fileUpload($request,'media');
		}

		//save blog
		$service=Auth::user()->services()->create($service);

		$tags=$request->input('tags');
		$tags_id=[];

		//find tags' id
		if(!empty($tags)){
			foreach($tags as $tag){
				$tag=Tag::firstOrCreate(['name'=>$tag]);
				array_push($tags_id,$tag->id);
			}
		}

		//sync tags
		$service->tags()->sync($tags_id);

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$service->seo()->create($seo);

		//add metas
		#excerpt:
		$meta_excerpt=$request->input('meta_excerpt');
		$metas[0] = new Meta([
			'name'  => 'meta_excerpt',
			'value' => ( $meta_excerpt ? $meta_excerpt : null ),
		]);

		foreach($metas as $meta){
			$service->metas()->save($meta);
		}

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
    	return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
    	$service->load(['tags','metas','seo']);

    	return view('panel.service.edit')->with(['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateService $request
	 * @param Service $service
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateService $request, Service $service)
    {
		$data=$request->all();

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($service->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
			//remove former image:
			if(!empty($service->image)){
				fileUploadRemove($service->image);
			}
		}

		//save blog
		$blogUpdateData=array_intersect_key(
			$data,
			array_flip(['title','body','image','published_at'])
		);

		$service->update($blogUpdateData);

		$tags=$request->input('tags');
		$tags_id=[];

		//find tags' id
		if(!empty($tags)){
			foreach($tags as $tag){
				$tag=Tag::firstOrCreate(['name'=>$tag]);
				array_push($tags_id,$tag->id);
			}
		}

		//sync tags
		$service->tags()->sync($tags_id);

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$service->seo()->update($seo);

		//update metas
		#excerpt:
		$meta_excerpt=$request->input('meta_excerpt');
		$metas[0] = ([
			'name'  => 'meta_excerpt',
			'value' => ( $meta_excerpt ? $meta_excerpt : null ),
		]);

		foreach($metas as $meta){
			$service->metas()->firstOrCreate(
				[ 'name'=>$meta['name'] ],
				$meta
			)->update($meta);
		}

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.service.edit',$service);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Service $service
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Service $service)
    {
    	//remove image
    	if(!empty($service->image)){
    		fileUploadRemove($service->image);
    	}

        $service->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

		Session::flash('success','اطلاعات با موفقیت حذف شد');


        return redirect()->route('panel.service.index');
    }
}
