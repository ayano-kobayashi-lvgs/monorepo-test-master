<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Auth FormRequest
 */
class AuthRequest extends FormRequest
{
    /**
     * Autorize
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Rules
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
            'password' => 'required',
        ];
    }

    /**
     * Attribute
     */
    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

    /**
     * Messages
     */
    public function messages()
    {
        return [
            'email.required' => ':attributeを入力してください。',
            'email.email' => ':attributeを正しい形式で入力してください。',
            'password.required' => ':attributeを入力してください。',
        ];
    }
}
