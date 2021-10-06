<?php

namespace App\Http\Controllers\Panel;


use App\Http\Requests\StorePage;
use App\Http\Requests\UpdatePage;
use App\Models\Meta;
use App\Models\Page;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
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
			$pages=Page::where('title','like','%'.$search.'%')->with(['tags']);
		}else{
			$pages=Page::with(['tags']);
		}

		return view('panel.page.index')->with(['pages'=>$pages->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StorePage $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StorePage $request)
    {
		$page=$request->except('user_id');

		if(!empty($page['publish']) && empty($page['published_at'])){
			$page['published_at']=Carbon::now();
		}

		//upload files
		if(!empty($request->file('media'))){
			$page['image']=fileUpload($request,'media');
		}

		//save page
		$page=Auth::user()->pages()->create($page);

        #show in first page:
        $meta_mainshow=$request->input('meta_mainshow');
        $metas[0] = new Meta([
            'name'  => 'meta_mainshow',
            'value' => ( $meta_mainshow ? now() : null ),
        ]);

        #first page tab's title
        $meta_tabtitle=$request->input('meta_tabtitle');
        $metas[1] = new Meta([
            'name'  => 'meta_tabtitle',
            'value' => ( $meta_tabtitle ? $meta_tabtitle : null ),
        ]);

        foreach($metas as $meta){
            $page->metas()->save($meta);
        }

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
		$page->tags()->sync($tags_id);

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$page->seo()->create($seo);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
    	return view('panel.page.show')->with(['page'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
    	$page->load(['tags','metas','seo']);

    	return view('panel.page.edit')->with(['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdatePage $request
	 * @param Page $page
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdatePage $request, Page $page)
    {
		$data=$request->only(
		'title',
			 'body',
			 'media',
			 'type',
			 'publish',
			 'seo_title',
			 'seo_description',
			 'seo_keywords',
			 'seo_canonical',
			 'tags',
			 'categories'
		);

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($page->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
			//remove former image:
			if(!empty($page->image)){
				fileUploadRemove($page->image);
			}
		}

		//save page
		$pageUpdateData=array_intersect_key(
			$data,
			array_flip(['title','body','image','published_at'])
		);

		$page->update($pageUpdateData);

        #show in first page:
        $meta_mainshow=$request->input('meta_mainshow');
        $metas[0] = ([
            'name'  => 'meta_mainshow',
            'value' => ( $meta_mainshow ? now() : null ),
        ]);

        #first page tab's title
        $meta_tabtitle=$request->input('meta_tabtitle');
        $metas[1] = ([
            'name'  => 'meta_tabtitle',
            'value' => ( $meta_tabtitle ? $meta_tabtitle : null ),
        ]);

        foreach($metas as $meta){
            $page->metas()->firstOrCreate(
                [ 'name'=>$meta['name'] ],
                $meta
            )->update($meta);
        }

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
		$page->tags()->sync($tags_id);

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$page->seo()->update($seo);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.page.edit',$page);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Page $page
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Page $page)
    {
    	//remove image
    	if(!empty($page->image)){
    		fileUploadRemove($page->image);
    	}

		$page->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

		Session::flash('success','اطلاعات با موفقیت حذف شد');

		return redirect()->route('panel.page.index');
    }

}
