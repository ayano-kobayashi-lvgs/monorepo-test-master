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

    /**
     * Messages
     */
    public function messages()
    {
        return array_merge([
            'password.regex' => '英大文字・小文字・数字の組み合わせ(8~24桁)で入力してください。',
        ], BaseRequest::BASE_RULES);
    }
}
