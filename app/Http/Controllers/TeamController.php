<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
    public function __invoke($id, $title)
    {
    	$team=Team::where('id','=',$id)->whereNotNull('published_at')->firstOrFail();

		return view('team')->with(['team'=>$team]);
    }
}
