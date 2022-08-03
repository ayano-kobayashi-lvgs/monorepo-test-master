<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('auth')
  ->name('auth.')
  ->group(function () {
  Route::get('/register', [UserController::class, 'register'])->name('register');
});

Route::post('auth/register', [UserController::class, 'completeRegister'])->name('auth.completeRegister');

Route::prefix('todos')
  ->name('todos.')
  ->group(function () {
  Route::get('/', [TodoController::class, 'index'])->name('index');
  Route::get('/create', [TodoController::class, 'create'])->name('create');
  Route::get('/{id}', [TodoController::class, 'show'])->name('show');
  Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('edit');
});

Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');
Route::put('todos/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('todos/{id}', [TodoController::class, 'delete'])->name('todos.delete');
