<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * LogoutController
 */
class LogoutController extends Controller
{
    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('auth.login', ['lang' => session('locale')]);
    }
}
