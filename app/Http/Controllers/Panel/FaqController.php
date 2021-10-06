<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\StoreFaq;
use App\Http\Requests\UpdateFaq;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$faqs=Faq::orderByDesc('id');

        return view('panel.faq.index')->with([
        	'faqs'=>$faqs->paginate()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreFaq $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreFaq $request)
    {
        $data=$request->all();

        Faq::create($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

        return redirect()->route('panel.faq.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
		return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('panel.faq.edit')->with(['faq'=>$faq]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateFaq $request
	 * @param Faq $faq
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateFaq $request, Faq $faq)
    {
        $data=$request->all();

		$faq->update($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

        return redirect()->route('panel.faq.edit',$faq);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Faq $faq
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Faq $faq)
    {
		$faq->delete();

		if(request()->expectsJson()){
			return response()->make('deleted successfully');
		}

		Session::flash('success','اطلاعات با موفقیت حذف شدند');

		return redirect()->route('panel.faq.index');
    }
}
