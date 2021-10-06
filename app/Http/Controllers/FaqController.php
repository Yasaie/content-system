<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
    	$faqs=Faq::all();

        return view('faq')->with(['faqs'=>$faqs]);
    }
}
