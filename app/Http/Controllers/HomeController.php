<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    	$slides=Slide::whereNotNull('published_at')->get();

        $pages=Page::whereHas('metas',function($query) {
            $query->where(function($query) {
                $query->where('name','=','meta_mainshow')
                    ->whereNotNull('value');
            });
        })
            ->whereNotNull('published_at')
            ->latest()
            ->limit(4)
            ->get();


    	$services=Service::whereNotNull('published_at')->limit(8)->get();

        $faqs=Faq::limit(5)->get();

		$customers=Customer::inRandomOrder()->limit(5)->get();

		$blogs=Blog::whereNotNull('published_at')->limit(7)->get();

        $teams=Team::whereHas('metas',function($query) {
            $query->where(function($query) {
                $query->where('name','=','meta_mainshow')
                    ->whereNotNull('value');
            });
        })
            ->whereNotNull('published_at')
            ->latest()
            ->limit(4)
            ->get();

        return view('index')->with([
        	'slides'			=> $slides,
            'pages'             => $pages,
        	'services' 			=> $services,
        	'faqs'              => $faqs,
        	'customers'			=> $customers,
        	'blogs'				=> $blogs,
        	'teams'				=> $teams,
		]);
    }
}
