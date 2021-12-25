<?php
use App\Http\Controllers\Driver\DriverModule;
use App\Http\Controllers\vendorPlan;
use App\Http\Controllers\AdminTaxController;
use App\Http\Controllers\currencyConroller;
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

//    Admin Settings
Route::get("/settings/admin_tax",[AdminTaxController::class, "index"])->name("admin.tax.index");
Route::post("/settings/admin_tax",[AdminTaxController::class, "save"])->name("admin.tax.update");
    Route::resource('subadmin', AdminController::class);
    Route::resource('/settings/currency', currencyConroller::class);

    Route::get("vendor/plan/request",[vendorPlan::class, 'index'])->name('vendor.plan');
    Route::get("vendor/plan/request/create",[vendorPlan::class, 'showcreate'])->name('vendor.plan.create');

//    Driver Files
    Route::get("driverModule/payouts",[DriverModule::class, "payouts"])->name("driverModule.payouts");
    Route::get("driverModule/settings",[DriverModule::class, "settings"])->name("driverModule.settings");
    Route::post("driverModule/settings/store",[DriverModule::class, "storeSettings"])->name("driverModule.settings.store");
    Route::get("driverModule/pending",[DriverModule::class, "pending"])->name("driverModule.pending");
    Route::get("driverModule/deposits",[DriverModule::class, "deposits"])->name("driverModule.deposits");
    Route::get("driverModule/transaction/list",[DriverModule::class, "transactions"])->name("driverModule.transaction.list");
    Route::get("driverModule/transaction/create",[DriverModule::class, "createTransaction"])->name("driverModule.transaction.create");
    Route::post("driverModule/transaction/store",[DriverModule::class, "storeTransaction"])->name("driverModule.transaction.store");
    Route::post("driverModule/transaction/accept",[DriverModule::class, "acceptTransaction"])->name("driverModule.transaction.accept");
    Route::post("driverModule/transaction/reject",[DriverModule::class, "rejectTransaction"])->name("driverModule.transaction.reject");
    Route::get("driverModule/transaction",[DriverModule::class, "deposits"])->name("driverModule.transaction");
    Route::get("driverModule/transaction/delete",[DriverModule::class, "deleteTransaction"])->name("driverModule.deleteTransaction");
    Route::resource('driverModule', Driver\DriverModule::class);
    Route::post("driverModule/accept/{id}",[DriverModule::class, "accept"])->name("driverModule.accept");
    Route::get("driverModule/track/{id}",[DriverModule::class, "track"])->name("driverModule.track");


    Route::resource("email", EmailTemplateController::class);
    //    Review Settings

    Route::group(["prefix"=>"review"],function(){
        Route::resource("vendor", review\vendorReviewController::class);
        Route::resource("driver", review\driverReviewController::class);
    });

    Route::get("/approveAllVendor", 'soft@vendorapprovalall');


// Customer
    Route::resource('customer', AppUserController::class);
    Route::get('customer/{id}/wallet/create', 'AppUserController@walletIndex');
    Route::get('customer/{id}/wallet', 'AppUserController@wallet');
    Route::post('customer/wallet/create', 'AppUserController@walletStore')->name("wallet.create");
    Route::post('/customer/wallet/delete/{id}', 'AppUserController@walletDelete')->name("wallet.delete");


//    Notification

    Route::get("/sendnotifications", "sendnotification@index");
    Route::post("/sendnotification", "sendnotification@post");



  	Route::get('/', 'soft@index');
    Route::get('/home', 'soft@index');
    Route::get('/view/allvendor', 'soft@viewallvendor');
    Route::get('/view/vendorapprovals', 'soft@vendorapprovals');
    Route::get('/view/vendorpayouts', 'soft@vendorpayouts');
    Route::get("/view/vendorstats","settings\\vendor_ct@index");
    Route::get("/view/approveproducts","soft@productAppproval");

    Route::get('/create/vendor', 'soft@createvendorshow');
    Route::post('/create-vendor', 'soft@createVendor');
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
    Route::get('/faqs/category/create', 'ct\faq@faqsCategoryAdd');
    Route::get('/create/faqs', 'ct\faq@create');
    Route::post('/create-faqs', 'ct\faq@store');
    Route::post('/create-faqs-categories', 'ct\faq@storeCategories');
    Route::post('/delete-faqs-categories', 'ct\faq@deleteCategories')->name("DeleteCategoryFaq");
    Route::get('/edit/faqs/{id}', 'ct\faq@edit');
    Route::post('/edit-faqs', 'ct\faq@update');
    Route::post('/delete-faqs', 'ct\faq@delete');


  	Route::get('view/orders', 'orders\ordersController@index');
    Route::get('/create/orders', 'orders\ordersController@create');
    Route::post('/getmenu', 'orders\ordersController@getmenu');
    Route::post('/create-orders', 'orders\ordersController@store');
    Route::get('/edit/orders/{id}', 'orders\ordersController@edit');
    Route::post('/edit-orders', 'orders\ordersController@update');
    Route::post('/delete-orders', 'orders\ordersController@delete');



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

  // System
    Route::get("/system/vendortype","system\\vendortype_ct@index");
    Route::get("/system/vendortype/create","system\\vendortype_ct@showcreate");
    Route::post("/system/vendortype/create","system\\vendortype_ct@create");
    Route::post("/system/vendortype/edit","system\\vendortype_ct@edit");
    Route::post("/system/vendortype/delete","system\\vendortype_ct@delete");
    Route::get("/system/vendortype/edit/{id}","system\\vendortype_ct@showedit");


    Route::get("/system/vendorcategories","system\\vendorcategories_ct@index");
    Route::get("/system/vendorcategories/create","system\\vendorcategories_ct@showcreate");
    Route::post("/system/vendorcategories/create","system\\vendorcategories_ct@create");
    Route::post("/system/vendorcategories/edit","system\\vendorcategories_ct@edit");
    Route::post("/system/vendorcategories/delete","system\\vendorcategories_ct@delete");
    Route::get("/system/vendorcategories/edit/{id}","system\\vendorcategories_ct@showedit");


    Route::get("/system/productfields","system\\productfields_ct@index");
    Route::get("/system/productfields/create","system\\productfields_ct@showcreate");
    Route::post("/system/productfields/create","system\\productfields_ct@create");
    Route::post("/system/productfields/edit","system\\productfields_ct@edit");
    Route::post("/system/productfields/delete","system\\productfields_ct@delete");
    Route::get("/system/productfields/edit/{id}","system\\productfields_ct@showedit");


    // plans
    Route::get("/sponsored_vendor_plans","plan\\sponsored_ct@index");
    Route::get("/sponsored_vendor_plans/create","plan\\sponsored_ct@showcreate");
    Route::get("/sponsored_vendor_plans/edit/{id}","plan\\sponsored_ct@showedit");
    Route::post("/sponsored_vendor_plans/create","plan\\sponsored_ct@create");
    Route::post("/sponsored_vendor_plans/edit","plan\\sponsored_ct@edit");
    Route::post("/sponsored_vendor_plans/delete","plan\\sponsored_ct@delete");


    Route::get("/featured_vendor_plans","plan\\featured_ct@index");
    Route::get("/featured_vendor_plans/create","plan\\featured_ct@showcreate");
    Route::get("/featured_vendor_plans/edit/{id}","plan\\featured_ct@showedit");
    Route::post("/featured_vendor_plans/create","plan\\featured_ct@create");
    Route::post("/featured_vendor_plans/edit","plan\\featured_ct@edit");
    Route::post("/featured_vendor_plans/delete","plan\\featured_ct@delete");


  // invoice
    Route::get("/invoice","invoice\\invoice_ct@index");
    Route::get("/invoice/create","invoice\\invoice_ct@showcreate");
    Route::get("/invoice/edit/{id}","invoice\\invoice_ct@showedit");
    Route::post("/invoice/create","invoice\\invoice_ct@create");
    Route::post("/invoice/edit","invoice\\invoice_ct@edit");
    Route::post("/invoice/delete","invoice\\invoice_ct@delete");

   	Route::get('/view/drivers', 'ct\drivers@index');
    Route::get('/create/drivers', 'ct\drivers@create');
    Route::post('/create-drivers', 'ct\drivers@store');
    Route::get('/edit/drivers/{id}', 'ct\drivers@edit');
    Route::post('/edit-drivers', 'ct\drivers@update');
    Route::get('/drivers/pending', 'ct\drivers@pendingRequest');
    Route::post('/delete-drivers', 'ct\drivers@delete');
    Route::get('/track/drivers', 'ct\drivers@track');
    Route::get('/settings/drivers', 'ct\drivers@settings');

	//  Notification

    Route::get("/sendnotifications", "sendnotification@index");
    Route::post("/sendnotification", "sendnotification@post");


  // Settings

    Route::group(["prefix"=>"settings"],function(){
        Route::get("/tawk","settings\\msnger@index");
        Route::post("/tawk","settings\\msnger@store");
              //Domain
        Route::get("/domainSettings","settings\\domain@index");
        Route::post("/domainSettings","settings\\domain@store");

        //        Product Units
        Route::get("/productunit","settings\\productunit_ct@index");
        Route::get("/productunit/create","settings\\productunit_ct@showcreate");
        Route::get("/productunit/edit/{id}","settings\\productunit_ct@showedit");
        Route::post("/productunit/create","settings\\productunit_ct@create");
        Route::post("/productunit/edit","settings\\productunit_ct@edit");
        Route::post("/productunit/delete","settings\\productunit_ct@delete");

        //        Deliver Radius
        Route::get("/deliveryradius","settings\\deliverstats@index");
        Route::post("/deliverradius","settings\\deliverstats@save");

        //        Map Settings
        Route::get("/mapssettings","settings\\mapkey_ct@index");
        Route::post("/mapssettings","settings\\mapkey_ct@save");

        //        Powerd By Text Settings
        Route::get("/poweredbytext","settings\\powerbytext_ct@index");
        Route::post("/poweredbytext","settings\\powerbytext_ct@save");

        //        Gateway Settings
        Route::get("/paymentgateways","settings\\gateway_ct@index");
        Route::post("/paymentgateways","settings\\gateway_ct@save");

        //        WhatsApp Settings
        Route::get("/whatsappsettings","settings\\whatsapp_ct@index");
        Route::post("/whatsappsettings","settings\\whatsapp_ct@save");

        //        App Settings
        Route::get("/appsettings","settings\\appsetting_ct@index");
        Route::post("/appsettings","settings\\appsetting_ct@save");
        //        Vendor Stats
        Route::get("/vendorstats","settings\\vendor_ct@index");

        //        SMS Settings
        Route::get("/smssettings","settings\\sms_ct@index");
        Route::post("/smssettings","settings\\sms_ct@save");
        Route::post("/smssettings/create","settings\\sms_ct@create");
        Route::get("/smssettings/create","settings\\sms_ct@showcreate");
        Route::get("/smssettings/edit/{id}","settings\\sms_ct@showedit");
        Route::post("/smssettings/edit","settings\\sms_ct@edit");
        Route::post("/smssettings/delete","settings\\sms_ct@delete");

              // Configure Vendor Website
        Route::get("/configure_vendor_website", "settings\\configure@index");
        Route::post("/configure_vendor_website", "settings\\configure@save");
    });



});
