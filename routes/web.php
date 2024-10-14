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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login.form');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::resource('/kategori', App\Http\Controllers\KategoriController::class);
    Route::resource('/post', App\Http\Controllers\PostController::class);
});

Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show']);
