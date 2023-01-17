<?php

namespace App\Http\Requests;

/**
 * User FormRequest
 */
class UserRequest extends BaseRequest
{
    /**
     * Rules
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:60',
            ],
            'email' =>  [
                'required',
                'email',
                'unique:users',
                'max:254',
            ],
            'password' => [
                'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,24}$/',
                'confirmed',
            ],
            'password_confirmation' => [
                'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,24}$/'
            ],
            'role' => [
                'required',
            ],
        ];
    }
}
