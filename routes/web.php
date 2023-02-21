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
    Route::post('/', 'signup')->name('.post');
});

Route::controller(App\Http\Controllers\Auth\LoginController::class)
->middleware('guest')
->prefix('/login')
->as('login')
->group(function(){
    Route::get('/', 'index');
    Route::post('/', 'login')->name('.post');
});

Route::controller(App\Http\Controllers\Share\ShareController::class)
->prefix('/share')
->as('share.')
->group(function(){
    Route::get('/{slug}', 'show')->name('show');
});
Route::controller(App\Http\Controllers\Auth\ForgotPasswordController::class)
->prefix('/forgot-password')
->as('password.forgot.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/check', 'check')->name('check');
    Route::get('/edit', 'edit')->name('edit')->middleware('signed');
    Route::put('/update', 'update')->name('update');
});

Route::middleware(['auth'])->group(function(){
    //home
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // link
    Route::controller(App\Http\Controllers\Personalize\PersonalizeController::class)
    ->prefix('/personalize')
    ->as('personalize.')
    ->group(function(){
        Route::put('/update', 'update')->name('update');
    });

    // link
    Route::controller(App\Http\Controllers\Link\LinkController::class)
    ->prefix('/link')
    ->as('link.')
    ->group(function(){
        Route::controller(App\Http\Controllers\Link\LinkController::class)
        ->group(function(){
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/store', 'store')->name('store');
            Route::put('/update', 'update')->name('update');
            Route::put('/reorder', 'reorder')->name('reorder');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
        
        Route::get('/render-input/{social_network_id?}', [App\Http\Controllers\Link\RenderInputController::class, 'show'])->name('render_input.show');
    });

    // profile
    Route::controller(App\Http\Controllers\Auth\ProfileController::class)
    ->prefix('/profile')
    ->as('profile.')
    ->group(function(){
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/show', 'show')->name('show');
        Route::put('/update', 'update')->name('update');
    });
    // auth 
    Route::prefix('/password')
    ->as('password.')
    ->group(function(){
        Route::controller(App\Http\Controllers\Auth\ChangePasswordController::class)
        ->prefix('/change')
        ->as('change.')
        ->group(function(){
            Route::get('/', 'index')->name('index');
            Route::put('/update', 'update')->name('update');
        });
    });

    Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

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
