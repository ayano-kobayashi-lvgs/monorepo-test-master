<?php

namespace App\Http\Requests;

/**
 * Auth FormRequest
 */
class AuthRequest extends BaseRequest
{
    /**
     * Rules
     */
    public function rules()
    {
        return [
            'email' =>  [
                'required',
                'string',
                'email',
                'max:254',
            ],
            'password' => [
                'required',
                'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,24}$/',
            ],
        ];
    }
}
