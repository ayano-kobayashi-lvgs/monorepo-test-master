<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CreateTodosTable
 */
class CreateTodosTable extends Migration
{
    /**
     * todoテーブル CREATE
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * todoテーブル DROPIF
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
