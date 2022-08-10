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
     * 権限名の全件取得
     */
    public static function getRoleValues(): array
    {
        return Role::toArray();
    }

    /**
     * 管理者権限の判断ロジック
     */
    public static function isAdmin(string $role): bool
    {
        return $role === self::ADMIN;
    }
}
