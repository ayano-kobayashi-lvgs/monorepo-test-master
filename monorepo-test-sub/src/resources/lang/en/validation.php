<?php

return [

    /**
     * バリデーションメッセージ(共通) 英語
     */

    'email' => 'This must be a valid email address.',
    'max' => [
        'string' => 'This must not be greater than :max characters.',
    ],
    'required' => 'This field is required.',
    'string' => 'This field must be a string.',
    'unique' => 'This value has already been taken.',

    /**
     * バリデーションメッセージ(カスタマイズ) 英語
     */

    'custom' => [
        'password' => [
            'regex' => 'This filed must be 8 to 24 characters and include alphabets (both uppercase and lowercase) and numbers.',
            'confirmed' => 'Passwords do not match',
        ],
        'password_confirmation' => [
            'regex' => 'This filed must be 8 to 24 characters and include alphabets (both uppercase and lowercase) and numbers.',
        ]
    ],

    /**
     * 属性
     */

    'attributes' => [],

];
