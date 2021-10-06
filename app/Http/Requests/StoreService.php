<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            'title' 		=> 'required|string',
            'body' 			=> 'required|string',
			'image'			=> 'nullable|file|mimes:jpg,jpeg,gif,tiff,png,bmp',
            'publish'		=> 'nullable|boolean',
        ];
    }
}
