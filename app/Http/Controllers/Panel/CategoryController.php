<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
    {
		$items 	= Category::orderBy('order')->get();

		$category 	= new Category;
		$category   = $category->getHTML($items);

        return view('panel.category.index')->with(['items'=>$items,'category'=>$category]);
    }

	/**
	 * Modify list of resource
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
    public function modify(Request $request){
		$source           = $request->input('source');
		$destination  	  = $request->input('destination',null);
		$item             = Category::findorFail($source);
		$item->parent_id  = $destination;
		$item->save();

		$order			=$request->input('order');
		$rootOrder		=$request->input('rootOrder');

		$ordering       = json_decode($order);
		$rootOrdering   = json_decode($rootOrder);

		if($ordering){
			foreach($ordering as $order=>$item_id){
				if($itemToOrder = Category::findOrFail($item_id)){
					$itemToOrder->order = $order;
					$itemToOrder->save();
				}
			}
		} else {
			foreach($rootOrdering as $order=>$item_id){
				if($itemToOrder = Category::findOrFail($item_id)){
					$itemToOrder->order = $order;
					$itemToOrder->save();
				}
			}
		}
		return response()->make('اطلاعات با موفقیت ذخیره شد');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreCategory $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreCategory $request)
    {
		$data=$request->only(['title','label','slug','publish']);

		if(!empty($data['publish']) && empty($data['published_at'])){
			$data['published_at']=Carbon::now();
		}

		$data['order']=Category::max('order')+1;

		Category::create($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    	return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('panel.category.edit')->with(['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateCategory $request
	 * @param Category $category
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateCategory $request, Category $category)
    {
    	$data=$request->only(['title','label','slug','publish']);

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($category->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

    	$category->update($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.category.edit',$category);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Category $category
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(Category $category)
    {
		// Find all items with the parent_id of this one and reset the parent_id to zero
		Category::where('parent_id', $category->id)->get()->each(function($item)
		{
			$item->parent_id = 0;
			$item->save();
		});

		// delete the category that the user requested to be deleted
		$category->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

        Session::flash('success','اطلاعات با موفقیت حذف شد');

        return redirect()->route('panel.category.index');
    }
}
