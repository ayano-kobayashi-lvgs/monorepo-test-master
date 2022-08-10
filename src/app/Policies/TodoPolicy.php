<?php

namespace App\Policies;

use App\Models\User;

/**
 * TodoPolicy
 */
class TodoPolicy
{
    /**
     * 登録処理
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * 更新処理
     */
    public function update(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * 削除処理
     */
    public function delete(User $user)
    {
        return $user->role === 'admin';
    }
}
