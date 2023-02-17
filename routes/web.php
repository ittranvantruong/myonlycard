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

Route::controller(App\Http\Controllers\Auth\SignupController::class)
->middleware('guest')
->prefix('/signup')
->as('signup')
->group(function(){
    Route::get('/', 'index');
    Route::post('/store', 'signup')->name('.post');
});

Route::controller(App\Http\Controllers\Auth\LoginController::class)
->middleware('guest')
->prefix('/login')
->as('login')
->group(function(){
    Route::get('/', 'index');
    Route::post('/', 'login')->name('.post');
});
Route::middleware('auth')->group(function(){
    //home
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // user
    Route::controller(App\Http\Controllers\User\UserController::class)
    ->middleware('usermanager')
    ->prefix('/user')
    ->as('user.')
    ->group(function(){
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});
