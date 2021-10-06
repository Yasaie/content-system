<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\UpdateProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('panel.profile.edit')->with(['user'=>Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateProfile $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateProfile $request)
    {
    	$data=$request->only(['name','email']);

		if($request->input('password')){
			$data['password']=Hash::make($request->input('password'));
		}

		Auth::user()->update($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

        return redirect()->route('panel.profile.edit');
    }
}
