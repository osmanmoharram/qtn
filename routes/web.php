<?php

use Illuminate\Support\Facades\{Auth, Route, Redirect};
use App\Http\Controllers\HomeController;

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
    return Auth::check()
        ? Redirect::route('home')
        : Redirect::route('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('home', [HomeController::class, 'showHomeView'])->name('home');
});
