<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
    	$search=$request->input('search');

    	if(!empty($search)){
			$blogs=Blog::where('title','like','%'.$search.'%')
						->whereNotNull('published_at');
    	}else{
			$blogs=Blog::whereNotNull('published_at');
    	}

		$blogs=$blogs->with(['tags','metas','seo','categories'=>function($query){
						 $query->whereNotNull('published_at');
					 }])
					 ->withCount(['comments'=>function($query){
						 $query->whereNotNull('published_at');
					 }]);

		if($request->expectsJson()){
			return response()->json($blogs->paginate(4));
		}

    	return view('blogs')->with(['blogs'=>$blogs->paginate(4)]);
    }

    public function show($id){
		$blog=Blog::where('id','=',$id)
				  ->whereNotNull('published_at')
				  ->with(['comments'=>function($query){
				  	$query->whereNotNull('published_at')
				  		  ->whereNull('parent_id');
				  },
				  'comments.children'=>function($query){
				  	$query->whereNotNull('published_at');
				  },'metas','seo','tags','categories'=>function($query){
				  	$query->whereNotNull('published_at');
				  }])
				  ->withCount(['comments'=>function($query){
				  	$query->whereNotNull('published_at');
				  }])
				  ->first();

		if(empty($blog)){
			return abort(404);
		}

        $randomBlogs=Blog::whereNotNull('published_at')->inRandomOrder()->limit(3)->get();

		return view('blog-single')->with([
		    'blog' => $blog,
            'randomBlogs' => $randomBlogs,
        ]);
    }
}
