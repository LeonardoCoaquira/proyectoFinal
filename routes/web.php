<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::get('/account/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('editProfile');
Route::get('/picProfile/{route}', [App\Http\Controllers\AccountController::class, 'showPicture']);
Route::post('/account/uploadPicture', [App\Http\Controllers\AccountController::class, 'uploadPicture'])->name('uploadPicture');
Route::get('/groups', [App\Http\Controllers\HomeController::class, 'groups'])->name('groups');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::post('/post/uploadPost', [App\Http\Controllers\PostController::class, 'uploadPost'])->name('uploadPost');


