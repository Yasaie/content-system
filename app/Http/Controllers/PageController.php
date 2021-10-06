<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function __invoke($id,$title){
    	$page=Page::where('id','=',$id)->whereNotNull('published_at')->firstOrFail();

		return view('page')->with(['page'=>$page]);
    }
}
