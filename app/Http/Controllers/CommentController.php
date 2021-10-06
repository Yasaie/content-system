<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function __invoke(StoreComment $request,$id){
		$data=$request->except(['published_at']);

		$blog=Blog::findOrFail($id);

		$blog->comments()->create($data);

		Session::flash('success','دیدگاه شما با موفقیت ثبت شد و بعد از تایید مدیریت نمایش داده میشود');

		return redirect()->back();
    }
}
