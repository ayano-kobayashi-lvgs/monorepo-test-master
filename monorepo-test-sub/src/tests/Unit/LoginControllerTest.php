<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index__ログイン画面を表示する(): void
    {
        $response = $this->get('/ja/auth/login');
        $response->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function login__登録したユーザ情報でログインできる(): void
    {
        $user = User::factory()->create([
            'name' => 'テスト小林',
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => Hash::make('Ayano5884'),
            'role' => 'admin',
        ]);

        $this->post(route('auth.login', ['lang' => 'ja']), [
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => 'Ayano5884',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function login__登録したのと異なるメールアドレスでログインできない(): void
    {
        User::factory()->create([
            'name' => 'テスト小林',
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => Hash::make('Ayano5884'),
            'role' => 'admin',
        ]);

        $this->post(route('auth.login', ['lang' => 'ja']), [
            'email' => 'ayanokobayashi@leverages.jp',
            'password' => 'Ayano5884',
        ]);

        $this->assertGuest();
    }

    /**
     * @test
     */
    public function login__登録したのと異なるパスワードでログインできない(): void
    {
        User::factory(User::class)->create([
            'name' => 'テスト小林',
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => Hash::make('Ayano5884'),
            'role' => 'admin',
        ]);

        $this->post(route('auth.login', ['lang' => 'ja']), [
            'email' => 'ayano.kobayashi@leverages.jp',
            'password' => 'Ayano5885',
        ]);

        $this->assertGuest();
    }
}
