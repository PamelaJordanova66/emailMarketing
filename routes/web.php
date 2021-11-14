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
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resources([
        'customers' => \App\Http\Controllers\Customer\CustomerController::class,
        'groups' => \App\Http\Controllers\Group\GroupController::class,
        'templates' => \App\Http\Controllers\Template\TemplateController::class,
    ]);
    
});
