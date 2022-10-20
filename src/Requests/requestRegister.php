<?php

namespace Bet\Login\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestRegister extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required|min:4|regex:/^[a-zA-Z0-9\s]+$/',
            'username' => 'required|min:4|alpha_num|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'terms' => '',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Please input your name',
            'fullname.regex' => 'full name must not contain symbol',
            'fullname.min' => 'min name is 4 character',
            'username.required' => 'Please input your username',
            'username.min' => 'min username is 4 character',
            'username.alpha_num' => 'username can only alphanumeric',
            'email.required' => 'Please input your email',
            'email.min' => 'Email is not a correct type of email',
            'password.required' => 'Please input your password',
            'password.min' => 'Please insert your new password at least 6 character',
            'password.regex' => 'Password must contain alfanumeric at least one capital character',
            'password.confirmed' => 'Your password confirmation did not match',
        ];
    }
}
