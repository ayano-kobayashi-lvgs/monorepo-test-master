<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

/**
 * LoginController
 */
class LoginController extends Controller
{
    /**
     * ログイン画面表示
     */ 
    public function getLoginPage()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理
     */
    public function authenticateUser(AuthRequest $request)
    {
        $cledentials = $request->validated();
        
        if (Auth::attempt($cledentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('todos.index'));
        }

        return redirect()->route('auth.login')->withErrors([
            'authError' => 'メールアドレスまたはパスワードが一致しません。',
        ]);
    }
}
