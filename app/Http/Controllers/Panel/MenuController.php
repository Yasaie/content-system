<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenu;
use App\Http\Requests\UpdateMenu;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
    {
		$items 	= Menu::orderBy('order')->get();

		$menu 	= new Menu;
		$menu   = $menu->getHTML($items);

        return view('panel.menu.index')->with(['items'=>$items,'menu'=>$menu]);
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
		$item             = Menu::findorFail($source);
		$item->parent_id  = $destination;
		$item->save();

		$order			=$request->input('order');
		$rootOrder		=$request->input('rootOrder');

		$ordering       = json_decode($order);
		$rootOrdering   = json_decode($rootOrder);

		if($ordering){
			foreach($ordering as $order=>$item_id){
				if($itemToOrder = Menu::findOrFail($item_id)){
					$itemToOrder->order = $order;
					$itemToOrder->save();
				}
			}
		} else {
			foreach($rootOrdering as $order=>$item_id){
				if($itemToOrder = Menu::findOrFail($item_id)){
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
        return view('panel.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreMenu $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreMenu $request)
    {
		$data=$request->only(['title','label','url','publish']);

		if(!empty($data['publish']) && empty($data['published_at'])){
			$data['published_at']=Carbon::now();
		}

		$data['order']=Menu::max('order')+1;

		Menu::create($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
    	return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('panel.menu.edit')->with(['menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateMenu $request
	 * @param Menu $menu
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateMenu $request, Menu $menu)
    {
    	$data=$request->only(['title','label','url','publish']);

		if(!empty($data['publish']) && empty($data['published_at'])){
			if($menu->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

    	$menu->update($data);

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.menu.edit',$menu);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Menu $menu
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(Menu $menu)
    {
		// Find all items with the parent_id of this one and reset the parent_id to zero
		Menu::where('parent_id', $menu->id)->get()->each(function($item)
		{
			$item->parent_id = null;
			$item->save();
		});

		// delete the menu that the user requested to be deleted
		$menu->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

        Session::flash('success','اطلاعات با موفقیت حذف شد');

        return redirect()->route('panel.menu.index');
    }
}
