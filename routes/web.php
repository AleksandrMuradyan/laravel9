<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    ['register' => false],
    ['login' => false]
);
/* HomeController */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Token_error', [App\Http\Controllers\HomeController::class, 'Token_error'])->name('token_error');
/* LoginController */
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/Token_login', [App\Http\Controllers\LoginController::class, 'Token_login'])->name('token_login');
/* UserController */
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');
Route::get('/product_list', [App\Http\Controllers\UserController::class, 'product_list'])->name('product_list');
Route::get('/product_edit/{id}', [App\Http\Controllers\UserController::class, 'product_edit'])->name('product_edit');
Route::get('/product_delete/{id}', [App\Http\Controllers\UserController::class, 'product_delete'])->name('product_delete');
Route::get('/logs', [App\Http\Controllers\UserController::class, 'logs'])->name('logs');

/* UserController - throttle */
Route::any('/delete_product', [App\Http\Controllers\UserController::class, 'delete_product'])->name('delete_product')->middleware( 'throttle:20,60');
Route::any('/product_update', [App\Http\Controllers\UserController::class, 'product_update'])->name('product_update')->middleware( 'throttle:20,60');
Route::any('/create_product', [App\Http\Controllers\UserController::class, 'create_product'])->name('create_product')->middleware( 'throttle:20,60');


