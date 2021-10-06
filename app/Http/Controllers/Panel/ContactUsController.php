<?php

namespace App\Http\Controllers\Panel;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUses=ContactUs::orderByDesc('id');

        return view('panel.contactUs.index')->with(['contactUses'=>$contactUses->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function show($id)
    {
		$contactUs=ContactUs::findOrFail($id);

    	$contactUs->markAsReaded();

        return view('panel.contactUs.show')->with(['contactUs'=>$contactUs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 */
    public function destroy($id)
    {
		$contactUs=ContactUs::findOrFail($id);

        $contactUs->delete();

		if(request()->expectsJson()){
			return response()->make('deleted successfully');
		}

        Session::flash('success','اطلاعات با موفقیت حذف شد');

        return redirect()->route('panel.contactUs.index');
    }
}
