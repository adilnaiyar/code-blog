<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            
            'name'      => 'required|min:4|max:50',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
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
            'name.required'     => "The Name is Required",
            'name.min'          => "The Name must be at least 4 characters",
            'email.required'    => "The Email is Required",
            'email.email'       => "Invalid E-mail Address",
            'email.unique'      => "This Email is already been taken",
            'password.required' => "The Password is Required",
            'password.min'      => "The Name must be at least 6 characters"
        ];
    }
}
