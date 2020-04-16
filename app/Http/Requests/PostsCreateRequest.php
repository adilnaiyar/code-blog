<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsCreateRequest extends FormRequest
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
            
            'title'       => 'required|unique:posts|max:50',
            'category_id' => 'required',
            'body'        => 'required',     
        ];
    }
    
    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'        => "The Title is Required",
            'title.unique'          => "This Title is already been taken", 
            'category_id.required'  => "The Category is Required",
            'body.required'         => "The Description is Required",  
        ];
    }
}
