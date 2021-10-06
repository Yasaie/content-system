<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
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
            'title' 	=> 'required|string|min:3',
            'label' 	=> 'required|string|min:3',
            'slug' 		=> 'nullable|string|min:3',
            'publish' 	=> 'nullable|boolean'
        ];
    }
}
