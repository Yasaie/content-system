<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\UpdateComment;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::with('commentable')->orderByDesc('created_at');

        return view('panel.comment.index')->with(['comments'=>$comments->paginate()]);
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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('panel.comment.show')->with(['comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('panel.comment.edit')->with(['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateComment $request
	 * @param Comment $comment
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateComment $request, Comment $comment)
    {
        $data=$request->only(['name','email','website','comment','publish']);

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($comment->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

        $comment->update($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.comment.index');
    }

	/**
	 * toggle comment publish
	 *
	 * @param Comment $comment
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function togglePublish(Comment $comment){
    	if($comment->published()){
    		$comment->markAsNotPublished();
    	}else{
    		$comment->markAsPublished();
    	}

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Comment $comment
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Comment $comment)
    {

		// Find all items with the parent_id of this one and reset the parent_id to zero
		Comment::where('parent_id', $comment->id)->get()->each(function($item)
		{
			$item->parent_id = null;
			$item->save();
		});

        $comment->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

		Session::flash('success','اطلاعات با موفقیت حذف شد');

		return redirect()->route('panel.comment.index');
    }
}
