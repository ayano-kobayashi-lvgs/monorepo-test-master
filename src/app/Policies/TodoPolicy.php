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
    public function create()
    {
        $this->user->isAdmin();
    }

    /**
     * 更新処理
     */
    public function update()
    {
        $this->user->isAdmin();
    }

    /**
     * 削除処理
     */
    public function delete()
    {
        $this->user->isAdmin();
    }
}
