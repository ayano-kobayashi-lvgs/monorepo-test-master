<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * User FormRequest
 */
class UserRequest extends FormRequest
{
    /**
     * Autorize
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:60',
            'email'=>'required|email|unique:users|max:254',
            'password' => 'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,24}$/|confirmed',
            'password_confirmation' => 'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,24}$/',
        ];
    }

    /**
     * Attribute
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'name' => '氏名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード(確認)',
        ];
    }

    /**
     * Messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください。',
            'name.max' => ':attributeを60文字以内で入力してください。',
            'email.required' => ':attributeを入力してください。',
            'email.email' => ':attributeを正しい形式で入力してください。',
            'email.unique' => 'こちらの:attributeはすでに登録済みです。',
            'email.max' => ':attributeを254文字以内で入力してください。',
            'password.regex' => ':attributeを英大文字・小文字・数字の組み合わせ(8~24桁)で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            'password_confirmation.regex' => ':attributeを英大文字・小文字・数字の組み合わせ(8~24桁)で入力してください。',
        ];
    }
}
