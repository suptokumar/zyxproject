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
Route::get("logout","soft@logout");
Route::get("signup","soft@signup");
Route::post("login","soft@login_check");
Route::post("signup","soft@register");
Route::get("forgetpassword","soft@forgetpassword");
Route::group(['middleware'=>'login'],function(){
    Route::get('/', 'soft@index');
    Route::get('/home', 'soft@index');
    Route::get('/view/allvendor', 'soft@viewallvendor');
    Route::get('/create/vendor', 'soft@createvendorshow');
    Route::post('/create-vendor', 'soft@ceratevendor');
    Route::get('/edit/vendor/{id}', 'soft@editvendor');
    Route::post('/update-vendor', 'soft@updatevendor');
    Route::post('/vendor-delete/{id}', 'soft@deletevendor');
    
    Route::group(['prefix'=>'settings'],function(){
    Route::get('/', 'ct/settings@index');
    Route::get('/mobileui', 'ct\settings@mobileui');
    });
    Route::get('/create/mobileui', 'ct\settings@createmobileui');
    Route::get('/edit/mobileui', 'ct\settings@editmobileui');
    Route::post('/create-mobileui', 'ct\settings@createpostui');
    Route::post('/edit-mobileui', 'ct\settings@editpostui');
    Route::post('/delete-ui', 'ct\settings@deleteui');
});
