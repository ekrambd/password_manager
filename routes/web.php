<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AjaxController;
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

Route::get('/', [IndexController::class, 'indexPage']);

Route::get('/get-password', [IndexController::class, 'getPassword']);

Route::post('admin-login', [AccessController::class, 'adminLogin']);

Route::get('/logout', [AccessController::class, 'Logout']);


Route::group(['middleware' => 'prevent-back-history'],function(){


	//admin dashboard

    Route::get('/dashboard', [DashboardController::class, 'Dashboard']);

	//categories
	Route::resource('categories', CategoryController::class);

	//categories
	Route::resource('password', PasswordController::class);


});


//ajax requests
Route::post('setup-2fa', [AjaxController::class, 'setupAuthenticator']);
Route::post('2fa-verify', [AjaxController::class, 'twofaVerify']);

Route::get('/show-password/{id}', [AjaxController::class, 'showPassword']);