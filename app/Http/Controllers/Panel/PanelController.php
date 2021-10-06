<?php

namespace App\Http\Controllers\Panel;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Consultant;
use App\Models\ContactUs;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Reconsult;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Tag;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

		// counts:

    	$catsCount['all']=Category::count();
    	$catsCount['published']=Category::whereNotNull('published_at')->count();

		$blogsCount['all']=Blog::count();
    	$blogsCount['published']=Blog::whereNotNull('published_at')->count();

		$pagesCount['all']=Page::count();
    	$pagesCount['published']=Page::whereNotNull('published_at')->count();

		$servicesCount['all']=Service::count();
		$customersCount['all']=Customer::count();

		$menusCount['all']=Menu::count();
		$faqsCount['all']=Faq::count();
		$contactUsCount['all']=ContactUs::count();
		$tagsCount['all']=Tag::count();
        $slidesCount['all']=Slide::count();
        $teamCount['all']=Team::count();


		// blogs:

		$blogs=Blog::limit(20)->get();

        return view('panel.index')->with([

			'catsCount' 	 => $catsCount,
			'blogsCount'	 => $blogsCount,
			'pagesCount' 	 => $pagesCount,
			'servicesCount'  => $servicesCount,
			'customersCount' => $customersCount,
			'menusCount' 	 => $menusCount,
			'faqsCount' 	 => $faqsCount,
			'contactUsCount' => $contactUsCount,
			'tagsCount' 	 => $tagsCount,
			'slidesCount' 	 => $slidesCount,
			'teamCount' 	 => $teamCount,

			'blogs'			 => $blogs,

		]);
    }
}
