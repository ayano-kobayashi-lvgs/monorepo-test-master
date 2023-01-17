<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function showRegister__ユーザ登録画面を表示する(): void
    {
        $response = $this->get(route('auth.register', ['lang' => 'ja']));
        $response->assertViewIs('auth.user-register');
    }

    /**
     * @test
     */
    public function executeRegister__ユーザ登録処理後、登録完了画面を表示する(): void
    {
        $response = $this->post(route('auth.completeRegister', ['lang' => 'ja']), [
            'name' => 'テスト小林',
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => 'Ayano5884',
            'password_confirmation' => 'Ayano5884',
            'role' => 'admin',
        ]);

        $response->assertViewIs('auth.user-register-complete');
    }

    /**
     * @test
     */
    public function executeRegister__氏名を入力しない場合、登録画面に再遷移し、エラーメッセージを表示する(): void
    {
        $this->post(route('auth.completeRegister', ['lang' => 'ja']), [
            'name' => '',
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => 'Ayano5884',
            'password_confirmation' => 'Ayano5884',
            'role' => 'admin',
        ]);

        $errorMessage = '必須入力です。';
        $this->get(route('auth.register', ['lang' => 'ja']))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function executeRegister__メールアドレスの形式が指定とことなる場合、登録画面に再遷移し、エラーメッセージを表示する(): void
    {
        $this->post(route('auth.completeRegister', ['lang' => 'ja']), [
            'name' => 'テスト小林',
            'email' => 'ayanokobayashileveragesjp',
            'password' => 'Ayano5884',
            'password_confirmation' => 'Ayano5884',
            'role' => 'admin',
        ]);

        $errorMessage = '入力内容に誤りがあります。';
        $this->get(route('auth.register', ['lang' => 'ja']))->assertSee($errorMessage);
    }
}
