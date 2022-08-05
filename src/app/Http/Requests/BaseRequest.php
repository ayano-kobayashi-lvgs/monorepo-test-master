<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * User FormRequest
 */
class BaseRequest extends FormRequest
{

    const BASE_RULES = [
        '*.required' => '必須入力です。',
        '*.string' => '入力内容に誤りがあります。',
        '*.email' => '入力内容に誤りがあります。',
        '*.max' => ':max以内で入力してください。',
        '*.unique' => '既に登録されています。',
    ];

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
     * Messages
     */
    public function messages()
    {
        return self::BASE_RULES;
    }
}
