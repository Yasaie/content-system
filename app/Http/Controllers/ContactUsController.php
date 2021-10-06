<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUs;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    public function create() {
		return view('contactUs');
    }

    public function store(StoreContactUs $request) {
		$data=$request->except('read_at');

		ContactUs::create($data);

		Session::flash('success','پیام شما با موفقیت ثبت شد');

		return redirect()->route('contactUs.create');
    }
}
