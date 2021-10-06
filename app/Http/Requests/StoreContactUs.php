<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactUs extends FormRequest
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
			'subject' 	=> 'required|string|min:3',
			'name'  	=> 'required|string|min:3',
			'email'  	=> 'nullable|email',
			'phone'  	=> 'required|string|min:3',
			'content'  	=> 'required|string|min:10'
        ];
    }
}
