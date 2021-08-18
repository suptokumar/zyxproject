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
Route::get("login","soft@login");
Route::post("login","soft@login_check");
Route::get("forgetpassword","soft@forgetpassword");
Route::group(['middleware'=>'login'],function(){
Route::get('/', 'soft@index');
});
