<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Models\Customer;
use App\Models\Meta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
    public function index(Request $request)
    {
    	$search=$request->input('search');

		$customers=Customer::where('name','like','%'.$search.'%');

		if($request->expectsJson()){
			return response()->json($customers->paginate());
		}

        return view('panel.customer.index')->with(['customers'=>$customers->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
	 * @param StoreCustomer $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreCustomer $request)
    {
        $data=$request->all();

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
		}

		//publish
		if(!empty($data['publish']) && empty($data['published_at'])){
			$data['published_at']=Carbon::now();
		}

		//show in main page
		if(!empty($data['mainpage']) && empty($data['show_in_main_page_at'])){
			$data['show_in_main_page_at']=Carbon::now();
		}

        $customer=Customer::create($data);

		//add metas
		#job:
		$meta_job=$request->input('meta_job');
		$metas[0] = new Meta([
			'name'  => 'meta_job',
			'value' => ( !empty($meta_job) ? $meta_job : null ),
		]);

		foreach($metas as $meta){
			$customer->metas()->save($meta);
		}

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

        return redirect()->route('panel.customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('panel.customer.edit')->with(['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
	 * @param UpdateCustomer $request
	 * @param Customer $customer
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateCustomer $request, Customer $customer)
    {
        $data=$request->all();

		//upload files
		if(!empty($request->file('media'))){
			$data['image']=fileUpload($request,'media');
		}

		//publish
		if(!empty($data['publish']) && empty($data['published_at'])){
			if($customer->notPublished()){
				$data['published_at']=Carbon::now();
			}
		}else{
			$data['published_at']=null;
		}

		//show in main page
		if(!empty($data['mainpage']) && empty($data['show_in_main_page_at'])){
			if($customer->notShowInMainPage()){
				$data['show_in_main_page_at']=Carbon::now();
			}
		}else{
			$data['show_in_main_page_at']=null;
		}

		$customer->update($data);

		//update metas
		#job:
		$meta_job=$request->input('meta_job');
		$metas[0] = ([
			'name'  => 'meta_job',
			'value' => ( !empty($data['meta_job']) ? $meta_job : null ),
		]);

		foreach($metas as $meta){
			$customer->metas()->firstOrCreate(
				[ 'name'=>$meta['name'] ],
				$meta
			)->update($meta);
		}

		Session::flash('success','اطلاعات با موفقیت ذخیره شد');

		return redirect()->route('panel.customer.edit',$customer);
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param Customer $customer
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(Customer $customer)
    {
    	//remove image
    	if(!empty($customer->image)){
    		fileUploadRemove($customer->image);
    	}

		$customer->delete();

        if(request()->expectsJson()){
        	return response()->make('deleted successfully');
        }

        Session::flash('success','اطلاعات با موفقیت حذف شد');

		return redirect()->route('panel.customer.index');
    }
}
