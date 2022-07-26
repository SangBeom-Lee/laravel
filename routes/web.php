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

Route::get('/home', function () {
    return view('home');
});

/* 회원 */
// 회원가입
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// 회원가입 저장처리
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
    ->middleware('guest');

// 로그인 페이지
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

// 로그인 처리
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])
    ->middleware('guest');

// 로그아웃 처리
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/* 게시판 */
Route::get('/board/{item}', [App\Http\Controllers\BoardController::class, 'index'])
    ->name('board');

Route::get('/board/{item}/write', [App\Http\Controllers\BoardController::class, 'write'])
    ->middleware(('auth'))
    ->name('board');

Route::get('/board/{item}/modify', [App\Http\Controllers\BoardController::class, 'write'])
    ->middleware(('auth'))
    ->name('board');
    
Route::get('/board/{item}/{id}', [App\Http\Controllers\BoardController::class, 'view'])
    ->name('board');