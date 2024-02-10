<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Auth::routes([
        'reset' => config('auth.password_reset_enabled'),
        'verify' => config('auth.email_verification_enabled'),
    ]);

    $auth_middlewares = config('auth.email_verification_enabled') ? ['auth', 'verified'] : ['auth'];
    Route::middleware($auth_middlewares)->group(function () {

        Route::get('/', function () {
            return view('welcome');
        });

    });
});
