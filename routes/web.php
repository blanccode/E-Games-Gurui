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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::group(['auth:sanctum', 'verified'], function() {
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');;
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:admin' , 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('index', \App\Http\Controllers\Admin\UserController::class);
    });
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::post('uploadPost', [\App\Http\Controllers\PostController::class, 'uploadPost'])->name('posts.uploadPost');
});


