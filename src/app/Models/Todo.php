<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Todo Model
 */
class Todo extends Model
{
    protected $fillable = ['title'];

    /**
     * Todo 一件取得
     *
     * @param integer $id
     * @return self
     */
    public function getById(int $id): self
    {
        return self::find($id);
    }

    /**
     * Todo 登録
     *
     * @param array $values
     * @return void
     */
    public function create(array $values)
    {
        return parent::create($values);
    }

    /**
     * Todo 更新
     *
     * @param integer $id
     * @param array $values
     * @return void
     */
    public function updateTodo(int $id, array $values)
    {
        return self::where('id', $id)
            ->update($values);
    }
}
