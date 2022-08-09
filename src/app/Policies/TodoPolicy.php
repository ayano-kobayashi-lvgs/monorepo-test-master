<?php

namespace App\Policies;

use App\Models\User;

/**
 * TodoPolicy
 */
class TodoPolicy
{
    // 自動生成されたものは削除したほうが良いですか？
    ///**
    // * Determine whether the user can view any models.
    // *
    // * @param  \App\Models\User  $user
    // * @return \Illuminate\Auth\Access\Response|bool
    // */
    //public function viewAny(User $user)
    //{
    //    return true;
    //}

    ///**
    // * Determine whether the user can view the model.
    // *
    // * @param  \App\Models\User  $user
    // * @param  \App\Models\Todo  $todo
    // * @return \Illuminate\Auth\Access\Response|bool
    // */
    //public function view(User $user, Todo $todo)
    //{
    //    return true;
    //}

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->role === 'admin';
    }

    ///**
    // * Determine whether the user can restore the model.
    // *
    // * @param  \App\Models\User  $user
    // * @param  \App\Models\Todo  $todo
    // * @return \Illuminate\Auth\Access\Response|bool
    // */
    //public function restore(User $user, Todo $todo)
    //{
    //    //
    //}

    ///**
    // * Determine whether the user can permanently delete the model.
    // *
    // * @param  \App\Models\User  $user
    // * @param  \App\Models\Todo  $todo
    // * @return \Illuminate\Auth\Access\Response|bool
    // */
    //public function forceDelete(User $user, Todo $todo)
    //{
    //    //
    //}
}
