<?php

namespace App\Http\Controllers\Panel;


use App\Http\Requests\StoreTeam;
use App\Http\Requests\UpdateTeam;
use App\Models\Meta;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
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
			$teams=Team::where('title','like','%'.$search.'%')->paginate();
		}else{
			$teams=Team::paginate();
		}

		return view('panel.team.index')->with(['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreTeam $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreTeam $request)
    {
		$team=$request->except('user_id');

		if(!empty($team['publish']) && empty($team['published_at'])){
			$team['published_at']=Carbon::now();
		}

		//upload files
		if(!empty($request->file('media'))){
			$team['image']=fileUpload($request,'media');
		}

		//save team
		$team=Auth::user()->teams()->create($team);

        #show in first team:
        $meta_mainshow=$request->input('meta_mainshow');
        $metas[0] = new Meta([
            'name'  => 'meta_mainshow',
            'value' => ( $meta_mainshow ? now() : null ),
        ]);

        #first team tab's title
        $meta_job=$request->input('meta_job');
        $metas[1] = new Meta([
            'name'  => 'meta_job',
            'value' => ( $meta_job? $meta_job: null ),
        ]);

        foreach($metas as $meta){
            $team->metas()->save($meta);
        }

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$team->seo()->create($seo);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
    	return view('panel.team.show')->with(['team'=>$team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
    	$team->load(['metas','seo']);

    	return view('panel.team.edit')->with(['team'=>$team]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateTeam $request
	 * @param Team $team
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateTeam $request, Team $team)
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
			 'categories'
		);

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($team->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
			//remove former image:
			if(!empty($team->image)){
				fileUploadRemove($team->image);
			}
		}

		//save team
		$teamUpdateData=array_intersect_key(
			$data,
			array_flip(['title','body','image','published_at'])
		);

		$team->update($teamUpdateData);

        #show in first team:
        $meta_mainshow=$request->input('meta_mainshow');
        $metas[0] = ([
            'name'  => 'meta_mainshow',
            'value' => ( $meta_mainshow ? now() : null ),
        ]);

        #first team tab's title
        $meta_job=$request->input('meta_job');
        $metas[1] = ([
            'name'  => 'meta_job',
            'value' => ( $meta_job? $meta_job: null ),
        ]);

        foreach($metas as $meta){
            $team->metas()->firstOrCreate(
                [ 'name'=>$meta['name'] ],
                $meta
            )->update($meta);
        }

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$team->seo()->update($seo);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.team.edit',$team);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Team $team
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Team $team)
    {
    	//remove image
    	if(!empty($team->image)){
    		fileUploadRemove($team->image);
    	}

		$team->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

		Session::flash('success','اطلاعات با موفقیت حذف شد');

		return redirect()->route('panel.team.index');
    }

}
