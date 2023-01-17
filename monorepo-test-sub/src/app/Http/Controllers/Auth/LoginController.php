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
    public function index()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理
     */
    public function login(AuthRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return redirect()->route('auth.login', ['lang' => session('locale')])->with('isLoginError', true);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('todos.index', ['lang' => session('locale')]));
    }
}
