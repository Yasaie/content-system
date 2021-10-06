<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'name' 		=> 'required|string|min:3',
            'email' 	=> 'required|email',
            'website' 	=> 'nullable|url',
            'comment' 	=> 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ];
    }
}
