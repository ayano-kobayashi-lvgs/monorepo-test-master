<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;

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
    public function __construct (
        public User $user,
    ) {}
    
    /**
     * ユーザ登録画面表示
     *
     * @return View
     */ 
    public function register(): View
    {
        return view('auth.user-register');
    }

    /**
     * ユーザ登録処理
     *
     * @param UserRequest $request
     * @return View
     */
    public function completeRegister(UserRequest $request): View
    {
        $values = $request->validated();
        
        $this->user->create($values);

        return view('auth.user-register-result');
    }
}
