<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\StoreBlog;
use App\Http\Requests\UpdateBlog;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
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
			$blogs=Blog::where('title','like','%'.$search.'%')->with(['tags']);
		}else{
			$blogs=Blog::with(['tags']);
		}

		return view('panel.blog.index')->with(['blogs'=>$blogs->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories=Category::whereNotNull('published_at')->get();

        return view('panel.blog.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreBlog $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreBlog $request)
    {
		$data=$request->except('user_id');

		if(!empty($data['publish']) && empty($data['published_at'])){
			$data['published_at']=Carbon::now();
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
		}

		//save blog
		$blog=Auth::user()->blogs()->create($data);

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
		$blog->tags()->sync($tags_id);

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$blog->seo()->create($seo);

		//sync categories
		$categories=$request->input('categories');

		$blog->categories()->sync($categories);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.blog.index');
    }

    /**
     * Store a newly created resource in storage as a note.
     *
	 * @param StoreBlog $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 */
	public function note(StoreBlog $request){
		$blog=$request->except('user_id');

		$blog['published_at']=null;
		$blog['image']=null;

		//save a note
		Auth::user()->blogs()->create($blog);

		if($request->expectsJson()){
			return response()->make('saved successfully');
		}

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->back();
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
    	return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
    	$blog->load(['tags','metas','seo','categories']);

    	$categories=Category::whereNotNull('published_at')->get();

    	return view('panel.blog.edit')->with(['blog'=>$blog,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateBlog $request
	 * @param Blog $blog
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateBlog $request, Blog $blog)
    {
		$data=$request->all();

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($blog->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
			//remove former image:
			if(!empty($blog->image)){
				fileUploadRemove($blog->image);
			}
		}

		//save blog
		$blogUpdateData=array_intersect_key(
			$data,
			array_flip(['title','body','image','published_at'])
		);

		$blog->update($blogUpdateData);

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
		$blog->tags()->sync($tags_id);

		//add seo configs
		$seo['title']=$request->input('seo_title');
		$seo['description']=$request->input('seo_description');
		$seo['keywords']=$request->input('seo_keywords');
		$seo['canonical']=$request->input('seo_canonical');

		$blog->seo()->update($seo);

		//sync categories
		$categories=$request->input('categories');

		$blog->categories()->sync($categories);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.blog.edit',$blog);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Blog $blog
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Blog $blog)
    {
    	//remove image
    	if(!empty($blog->image)){
    		fileUploadRemove($blog->image);
    	}

		$blog->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

		Session::flash('success','اطلاعات با موفقیت حذف شد');

		return redirect()->route('panel.blog.index');
    }
}
