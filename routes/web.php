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



//Route::middleware(['auth:sanctum', 'verified'])->get( '/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
//
//Route::group(['auth:sanctum', 'verified'], function() {
//    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');;
//});

Route::get('redirects', '\App\Http\Controllers\RedirectsAfterLoginController@redirect');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:admin' , 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('archive/yt-profile',[\App\Http\Controllers\YoutubeController::class, 'index' ]);
        Route::get('archive/twitch-profile',[\App\Http\Controllers\TwitchController::class, 'index' ]);

        Route::resource('archive',\App\Http\Controllers\Admin\UserController::class);
//        Route::resource('/archive',\App\Http\Controllers\Admin\PostController::class);
        Route::get('articles/feature/{id}', [\App\Http\Controllers\Admin\NewsController::class , 'feature']);
        Route::resource('articles', \App\Http\Controllers\Admin\NewsController::class);
//        Route::get('/artikels/{id}', \App\Http\Livewire\Admin\NewsController::class)->name('artikels');
//        Route::delete('/artikels/{new}', [\App\Http\Controllers\Admin\NewsController::class, 'destroy']);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    });

    Route::post('paypal-order', [\App\Http\Controllers\PaypalController::class, 'create']);


    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resource('articles/our-story', \App\Http\Controllers\OurStoryController::class);
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    Route::post('paypal-capture', [\App\Http\Controllers\PaypalController::class, 'capture']);
    Route::get('contendership/twitch-ranking',[\App\Http\Controllers\ContendershipController::class, 'twitchIndex']);

    Route::resource('contendership',\App\Http\Controllers\ContendershipController::class);

    Route::resource('contendership/youtube-ranking',\App\Http\Controllers\ContendershipController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::post('uploadPost', [\App\Http\Controllers\PostController::class, 'uploadPost'])->name('posts.uploadPost');
});


