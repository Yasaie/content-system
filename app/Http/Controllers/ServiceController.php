<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request){
    	$search=$request->input('search');

    	if(!empty($search)){
			$services=Service::where('title','like','%'.$search.'%')
						->whereNotNull('published_at');
    	}else{
			$services=Service::whereNotNull('published_at');
    	}

		$services=$services->with(['tags','metas','seo']);

		if($request->expectsJson()){
			return response()->json($services->paginate(12));
		}

    	return view('services')->with(['services'=>$services->paginate(12)]);
    }

    public function show($id){
		$service=Service::where('id','=',$id)
				  		 ->whereNotNull('published_at')
				  		 ->first();

		if(empty($service)){
			return abort(404);
		}

		return view('service-single')->with(['service' => $service]);
    }
}
