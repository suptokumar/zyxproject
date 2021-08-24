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
    // Vendor
    Route::post("create-vendor","api\\vendor_ct@create_vendor");
    Route::post("get-vendor","api\\vendor_ct@get_vendor");
    Route::post("update-vendor","api\\vendor_ct@update_vendor");
    Route::post("delete-vendor","api\\vendor_ct@delete_vendor");
    // Domain
    Route::post("get-domain","api\\domain_ct@get_domain");
    Route::post("check-domain","api\\domain_ct@check_domain");
    Route::post("create-domain","api\\domain_ct@create_domain");
    Route::post("delete-domain","api\\domain_ct@delete_domain");
    // Mobile UI
    Route::post("get-mobileUI","api\\mobile_ct@mobileui");
});