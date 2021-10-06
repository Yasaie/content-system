<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Request $request,$id){
    	$search=$request->input('search');

    	if(!empty($search)){
			$blogs=Blog::where('title','like','%'.$search.'%')
						->whereNotNull('published_at');
    	}else{
			$blogs=Blog::whereNotNull('published_at');
    	}

		$blogs=$blogs->whereHas('tags',function($query) use ($id) {
			$query->where('tags.id','=',$id);
		})->with(['tags','metas','seo','categories']);

		if($request->expectsJson()){
			return response()->json($blogs->paginate(4));
		}

    	return view('blogs')->with(['blogs'=>$blogs->paginate(4)]);
    }
}
