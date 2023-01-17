<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomPasswordValidation implements Rule
{
    private const MIN_CHARACTER = 8;
    private const MAX_CHARACTER = 24;
    private const INCLUDE_AT_LEAST_ONE_UPPER_CASE = true;
    private const INCLUDE_AT_LEAST_ONE_LOWER_CASE = true;
    private const INCLUDE_AT_LEAST_ONE_NUMBER = true;

    /**
     * construct
     */
    public function __construct()
    {
    }

    /**
     * バリデーションの結果判定
     */
    public function passes($attribute, $value): bool
    {
        $regexOfValidation = "";

        // 半角英字(大文字)1文字以上
        if (self::INCLUDE_AT_LEAST_ONE_UPPER_CASE) {
            $regexOfValidation = '(?=.*[A-Z])' . $regexOfValidation;
        }
        // 半角英字(小文字)1文字以上
        if (self::INCLUDE_AT_LEAST_ONE_LOWER_CASE) {
            $regexOfValidation = '(?=.*[a-z])' . $regexOfValidation;
        }
        // 半角数字1文字以上
        if (self::INCLUDE_AT_LEAST_ONE_NUMBER) {
            $regexOfValidation = '(?=.*[0-9])' . $regexOfValidation;
        }
        // 最大文字数・最小文字数
        if (self::MIN_CHARACTER || self::MAX_CHARACTER) {
            $regexOfValidation = $regexOfValidation . '{' . self::MIN_CHARACTER . ',' . self::MAX_CHARACTER . '}';
        }

        $regexOfValidation = "/^{$regexOfValidation}$/";


        return preg_match($regexOfValidation, $value);
    }

    /**
     * バリデーションエラーメッセージ取得
     */
    public function message(): string
    {
        $validationMessage = 'パスワードは';
        $validationOneLetterMessage = [];
        if (self::INCLUDE_AT_LEAST_ONE_LOWER_CASE) {
            $validationOneLetterMessage[] = '半角英字(小文字)';
        }
        if (self::INCLUDE_AT_LEAST_ONE_UPPER_CASE) {
            $validationOneLetterMessage[] = '半角英字(小文字)';
        }
        if (self::INCLUDE_AT_LEAST_ONE_NUMBER) {
            $validationOneLetterMessage[] = '半角数字';
        }
        if ($validationOneLetterMessage) {
            $validationMessage .= implode('、', $validationOneLetterMessage) . 'を1文字以上含む';
        }
        if (self::MIN_CHARACTER) {
            $validationMessage .= self::MIN_CHARACTER . '文字以上';
        }
        if (self::MAX_CHARACTER) {
            $validationMessage .= self::MAX_CHARACTER . '文字以下';
        }
        $validationMessage .= 'で入力してください。';

        return $validationMessage;
    }
}
