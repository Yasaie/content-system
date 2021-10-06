<?php

namespace App\Http\Controllers\Panel;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $slides = Slide::latest()->paginate();

        return view('panel.slide.index')->with([
            'slides' => $slides
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data=$request->all();

		if (!empty($data['publish']) && empty($data['published_at'])) {
			$data['published_at'] = now();
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
		}

		Slide::create($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.slide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('panel.slide.edit')->with(['slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
		$data=$request->only('title','body','url','color','published_at','publish');

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($slide->notPublished()){
				$data['published_at'] = now();
			}
		}else{
			$data['published_at']=null;
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
			//remove former image:
			if(!empty($slide->image)){
				fileUploadRemove($slide->image);
			}
		}

		$slide->update($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Slide $slide
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Slide $slide)
    {
    	//remove image
    	if (!empty($slide->image)) {
    		fileUploadRemove($slide->image);
    	}

		$slide->delete();

        if ($request->expectsJson()) {
        	return response()->make('deleted successfully');
        }

		Session::flash('success','اطلاعات با موفقیت حذف شد');

		return redirect()->route('panel.slide.index');
    }
}
