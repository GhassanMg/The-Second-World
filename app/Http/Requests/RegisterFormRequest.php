<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|size:10|',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required_with:password',

        ];
    }

    public function attributes()
    {
        return[
            'name'                     => 'user name',
            'email'                    => 'user email',
            'phone'                    => 'user phone',
            'password'                 => 'password',
            'password_confirmation'    => 'password_confirmation',
        ];
    }
}
