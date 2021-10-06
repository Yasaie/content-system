<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request,$id){
    	$search=$request->input('search');

    	if(!empty($search)){
			$blogs=Blog::where('title','like','%'.$search.'%')
						->whereNotNull('published_at');
    	}else{
			$blogs=Blog::whereNotNull('published_at');
    	}

		$blogs=$blogs->whereHas('categories',function($query) use ($id) {
			$query->where('nested.id','=',$id)->whereNotNull('published_at');
		})->with(['tags','metas','seo','categories'=>function($query){
			$query->whereNotNull('published_at');
		}]);

		if($request->expectsJson()){
			return response()->json($blogs->paginate(4));
		}

    	return view('blogs')->with(['blogs'=>$blogs->paginate(4)]);
    }

}
