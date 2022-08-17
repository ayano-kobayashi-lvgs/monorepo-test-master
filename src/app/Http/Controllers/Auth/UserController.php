<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

/**
 * UserController
 */
class UserController extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(
        public User $user,
    ) {
    }

    /**
     * ユーザ登録画面表示
     *
     * @return View
     */
    public function showRegister(): View
    {
        return view('auth.user-register');
    }

    /**
     * ユーザ登録処理
     *
     * @param UserRequest $request
     * @return View
     */
    public function executeRegister(UserRequest $request): View
    {
        $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return view('auth.user-register-complete');
    }
}
