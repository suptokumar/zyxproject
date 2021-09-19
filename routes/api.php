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
    // Create APP USER
    Route::post("create-appuser","api\\appuser_ct@create_appuser");
    Route::post("get-appuser","api\\appuser_ct@get_appuser");
    Route::post("delete-appuser","api\\appuser_ct@delete_appuser");
    Route::post("update-appuser","api\\appuser_ct@update_appuser");
    // FAQ Modules
    Route::post("faq-category","api\\faq_ct@get_faq_category");
    Route::post("create-faq","api\\faq_ct@create_faq");
    Route::post("get-faq","api\\faq_ct@get_faq");
    Route::post("update-faq","api\\faq_ct@update_faq");
    Route::post("delete-faqs","api\\faq_ct@delete_faq");

    // banners Modules
    Route::post("get-banners","api\\banners_ct@get_banners");
    Route::post("get-banner-category","api\\banners_ct@get_banner_category");
    Route::post("get-banner-location","api\\banners_ct@get_banner_location");
    Route::post("create-banners","api\\banners_ct@create_banners");   
    Route::post("update-banners","api\\banners_ct@update_banners");
    Route::post("delete-banners","api\\banners_ct@delete_banners");
     // pages Modules
     Route::post("create-pages","api\\pages_ct@create_pages");
     Route::post("get-pages","api\\pages_ct@get_pages");
     Route::post("update-pages","api\\pages_ct@update_pages");
     Route::post("delete-pages","api\\pages_ct@delete_pages");
  // Coupon Modules
     Route::post("get-coupons","api\\coupons_ct@getcoupons");
     Route::post("get-bankoffers","api\\coupons_ct@getbankoffers");
});