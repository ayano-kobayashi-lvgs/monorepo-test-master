<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Role Enum
 */
class Role extends Enum
{
    // 管理者
    const ADMIN = 'admin';
    // 一般
    const MEMBER = 'member';

    /**
     * 権限のDB値 全件取得
     */
    public static function getRoleValues()
    {
        return Role::toArray();
    }

    /**
     * 管理者権限の判断ロジック
     */
    public static function isAdmin($role): bool
    {
        return $role === self::ADMIN;
    }
}
