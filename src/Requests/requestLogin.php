<?php

namespace Bet\Login\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestLogin extends FormRequest
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
            'username' => 'required|min:4',
            'password' => 'required|min:6',
            'remember' => '',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'username.min' => 'min username 4 character',
            'password.required' => 'password is required',
            'password.min' => 'min password 6 character',
        ];
    }
}
