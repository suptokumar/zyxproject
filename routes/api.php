<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware"=>"api_token"],function(){
    Route::get("create-vendor","api\\vendor@create_vendor");
    Route::get("get-vendor","api\\vendor@get_vendor");
    Route::post("update-vendor","api\\vendor@update_vendor");
});