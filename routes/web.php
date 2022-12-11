<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::post('/uploadPost', [App\Http\Controllers\PostController::class, 'uploadPost'])->name('uploadPost');
Route::post('/deletePost', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');
Route::post('/subirComentario', [App\Http\Controllers\PostController::class, 'subirComentario'])->name('subirComentario');
Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('groups');
Route::post('/createGroup', [App\Http\Controllers\GroupController::class, 'createGroup'])->name('createGroup');