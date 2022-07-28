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
Route::get('/board/{board_name}', [App\Http\Controllers\BoardController::class, 'index'])
    ->name('board_list');

Route::get('/board/{board_name}/write', [App\Http\Controllers\BoardController::class, 'write'])
    ->middleware(('auth'))
    ->name('board_write');

Route::get('/board/{board_name}/modify', [App\Http\Controllers\BoardController::class, 'write'])
    ->middleware(('auth'))
    ->name('board_modify');
    
Route::get('/board/{board_name}/{id}', [App\Http\Controllers\BoardController::class, 'view'])
    ->name('board_view');

/* 게시판 POST 처리 */
Route::post('/board/{board_name}/save/', [App\Http\Controllers\BoardController::class, 'postSave'])
    ->name('board_save');
Route::post('/board/{board_name}/update/{id}', [App\Http\Controllers\BoardController::class, 'postEdit'])
    ->name('board_edit');
Route::post('/board/{board_name}/del/{id}', [App\Http\Controllers\BoardController::class, 'postDel'])
    ->name('board_del');