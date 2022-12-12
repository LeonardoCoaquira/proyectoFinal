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
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::get('/account/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('editProfile');
Route::get('/picProfile/{route}', [App\Http\Controllers\AccountController::class, 'showPicture']);
Route::post('/account/uploadPicture', [App\Http\Controllers\AccountController::class, 'uploadPicture'])->name('uploadPicture');
Route::post('/uploadPost', [App\Http\Controllers\PostController::class, 'uploadPost'])->name('uploadPost');
Route::post('/deletePost', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');
Route::post('/uploadComment', [App\Http\Controllers\PostController::class, 'uploadComment'])->name('uploadComment');
Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('groups');
Route::post('/createGroup', [App\Http\Controllers\GroupController::class, 'createGroup'])->name('createGroup');
Route::get('/animals', [App\Http\Controllers\AnimalController::class, 'index'])->name('animals');
Route::get('/animals/search', [App\Http\Controllers\AnimalController::class, 'searchDataAnimal'])->name('searchAnimal');
Route::get('/app/{route}', [App\Http\Controllers\HomeController::class, 'showPictureApp']);