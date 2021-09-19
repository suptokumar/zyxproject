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
Route::get("login","soft@login")->name("login");
Route::get("logout","soft@logout");
Route::get("signup","soft@signup");
Route::post("login","soft@login_check");
Route::post("signup","soft@register");
Route::get("forgetpassword","soft@forgetpassword");
Route::group(['middleware'=>'auth:admin'],function(){
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


    Route::get('/faqs', 'ct\faq@index');
    Route::get('/faqs/category', 'ct\faq@faqsCategory');
    Route::get('/create/faqs', 'ct\faq@create');
    Route::post('/create-faqs', 'ct\faq@store');
    Route::get('/edit/faqs/{id}', 'ct\faq@edit');
    Route::post('/edit-faqs', 'ct\faq@update');
    Route::post('/delete-faqs', 'ct\faq@delete');


    Route::get('/view/banners', 'ct\banners@index');
    Route::get('/create/banners', 'ct\banners@create');
    Route::post('/create-banners', 'ct\banners@store');
    Route::get('/edit/banners/{id}', 'ct\banners@edit');
    Route::post('/edit-banners', 'ct\banners@update');
    Route::post('/delete-banners', 'ct\banners@delete');
    Route::get('/category/banners', 'ct\banners@category');
    Route::get('/banners/create-category', 'ct\banners@categoryCreate');
    Route::post('/banners/create-category', 'ct\banners@categoryStore');
    Route::get('/edit/banners/{id}', 'ct\banners@edit');
    Route::post('/edit-banners', 'ct\banners@update');
    Route::get('/location/banners', 'ct\banners@location');
    Route::get('/banners/create-locations', 'ct\banners@createLocation');
    Route::post('/banners/store-location', 'ct\banners@storeLocation');
    Route::get('/edit/banners/{id}', 'ct\banners@edit');
    Route::post('/edit-banners', 'ct\banners@update');
    Route::post('/delete-banners', 'ct\banners@delete');
    

    Route::get('/view/pages', 'ct\pages@index');
    Route::get('/create/pages', 'ct\pages@create');
    Route::post('/create-pages', 'ct\pages@store');
    Route::get('/edit/pages/{id}', 'ct\pages@edit');
    Route::post('/edit-pages', 'ct\pages@update');
    Route::post('/delete-pages', 'ct\pages@delete');
  
  

// Coupon
    Route::get("/coupons","ct\coupons\couponct@showall");
    Route::get("/addcoupons","ct\coupons\couponct@addnew");
    Route::get("/editcoupons/{id}","ct\coupons\couponct@editcoupons");
    Route::post("/addcoupons","ct\coupons\couponct@saveaddcoupons");
    Route::post("/editcoupons","ct\coupons\couponct@saveeditcoupons");
    Route::post("/deletecoupons","ct\coupons\couponct@deletecoupons");

// Bankoffers
    Route::get("/bankoffers","ct\coupons\bankoffers_ct@bankoffers");
    Route::get("/addbankoffers","ct\coupons\bankoffers_ct@addbankoffers");
    Route::get("/editbankoffers/{id}","ct\coupons\bankoffers_ct@editbankoffers");
    Route::post("/addbankoffers","ct\coupons\bankoffers_ct@saveaddbankoffers");
    Route::post("/editbankoffers","ct\coupons\bankoffers_ct@saveeditbankoffers");
    Route::post("/deletebankoffers","ct\coupons\bankoffers_ct@deletebankoffers");

    
});
