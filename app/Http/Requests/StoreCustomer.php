<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'name'		=> 'required|string',
			'phone'		=> 'nullable|string|min:3',
			'meta_job'	=> 'nullable|string|min:3',
			'idea'		=> 'required|string',
			'image'		=> 'nullable|file|mimes:jpg,jpeg,gif,tiff,png,bmp',
            'publish'	=> 'nullable|boolean',
            'mainpage'	=> 'nullable|boolean',
        ];
    }
}
