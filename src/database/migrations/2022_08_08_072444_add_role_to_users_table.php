<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * role 追加
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role');
        });
    }

    /**
     * role 削除
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role');
        });
    }
}
