<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
  Route::get('/register', [UserController::class, 'showRegister'])->name('register');
  Route::post('/register', [UserController::class, 'executeRegister'])->name('completeRegister');
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
  Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth', 'prefix' => 'todos', 'as' => 'todos.'], function () {
  Route::get('/', [TodoController::class, 'index'])->name('index');
  Route::get('/create', [TodoController::class, 'create'])->name('create');
  Route::get('/{id}', [TodoController::class, 'show'])->name('show');
  Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('edit');
  Route::post('/store', [TodoController::class, 'store'])->name('store');
  Route::put('/{id}', [TodoController::class, 'update'])->name('update');
  Route::delete('/{id}', [TodoController::class, 'delete'])->name('delete');
});
