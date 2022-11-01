<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
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





/*Middleware*/
Route::group(['middleware' => 'login'], function () {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/user',[UserController::class,'view'])->name('user');

    //user insert
    Route::post('/insert_userdata',[UserController::class,'user_insert'])->name('user.insert');
    Route::get('/delete_userdata/{id}',[UserController::class,'user_delete'])->name('user.delete');
});


Route::get('/login',[loginController::class,'login'])->name('login');
Route::get('/logincheck',[loginController::class,'adminlogin'])->name('logincheck');
Route::get('/logout',[loginController::class,'logout'])->name('logout');



