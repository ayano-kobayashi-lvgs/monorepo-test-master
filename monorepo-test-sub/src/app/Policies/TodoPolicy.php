<?php

namespace App\Policies;

use App\Models\User;

/**
 * TodoPolicy
 */
class TodoPolicy
{
    public function __construct(
        public User $user,
    ) {
    }

    /**
     * 登録処理
     */
    public function create(User $user): bool
    {
        return $user->isAdmin($user);
    }

    /**
     * 更新処理
     */
    public function update(User $user): bool
    {
        return $user->isAdmin($user);
    }

    /**
     * 削除処理
     */
    public function delete(User $user): bool
    {
        return $user->isAdmin($user);
    }
}
