<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\reviewController;
use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\api\domainController;
use App\Http\Controllers\api\PlanRequest;
use App\Http\Controllers\api\ResellerClub;
use App\Http\Controllers\settings\vendor_ct;
use App\Http\Controllers\settings\msnger;
use App\Http\Controllers\AdminTaxController;

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

//    Wallet APIS
Route::get("/vendorWallet/{vendorId}", [vendor_ct::class,"vendorWallet"]);
Route::get("/settings/adminTax", [AdminTaxController::class,"show"]);
Route::group(["middleware"=>"api_token"],function(){
//    ResellerCLub Apis
    Route::post("/registerDomain", [ResellerClub::class, "registerDomain"]);
    Route::post("/createUser", [ResellerClub::class, "createUser"]);
    Route::post("/checkDomain", [ResellerClub::class, "checkDomain"]);
    Route::post("/checkDomainPrice", [ResellerClub::class, "checkDomainPrice"]);

//    Plan APIS
    Route::post("/create-plan-change-request", [PlanRequest::class, "CreatePlanRequests"]);
    Route::post("/get-plan-change-request", [PlanRequest::class, "getPlanRequests"]);
    Route::post("/delete-plan-change-request", [PlanRequest::class, "deletePlanRequests"]);
    Route::post("/op-plan-change-request", [PlanRequest::class, "statPlanRequests"]);
    /* ************* DOMAIN APIs ************************** */
    Route::post('/check-parked-domain', [domainController::class, "getDomain"]);
    Route::post('/check-sub-domain', [domainController::class, "SubDomain"]);
    Route::post('/create-sub-domain', [domainController::class, "CreateSubDomain"]);
    Route::post('/create-new-domain', [domainController::class, "CreateDomain"]);
    Route::post('/del-sub-domain', [domainController::class, "DeleteSubDomain"]);
    Route::post('/get-domain-settings', [domainController::class, "getDomainSettings"]);
    Route::post('/update-domain-settings', [domainController::class, "updateDomainSettings"]);

    Route::post('/get-msnger-settings', [msnger::class, "getSettings"]);


    //    Email and FCM API
    Route::post("sendEmail", [NotificationController::class, 'sendEmail']);
    Route::post("sendFCM", [NotificationController::class, 'sendFCM']);

    //    Review API
    Route::post("get-driverReviewOptions", [reviewController::class, 'driver']);
    Route::post("get-vendorReviewOptions", [reviewController::class, 'vendor']);
    Route::post("get-vendorReview", [reviewController::class, 'getVendorReview']);
    Route::post("get-driverReview", [reviewController::class, 'getDriverReview']);
    Route::post("create-driverReview", [reviewController::class, 'createDriverReview']);
    Route::post("create-vendorReview", [reviewController::class, 'createVendorReview']);
    // Vendor
    Route::post("create-vendor","api\\vendor_ct@create_vendor");
    Route::post("get-vendor","api\\vendor_ct@get_vendor");
    Route::post("update-vendor","api\\vendor_ct@update_vendor");
    Route::post("delete-vendor","api\\vendor_ct@delete_vendor");
    Route::post("approve-payout","api\\vendor_ct@approve_payout");
    Route::post("change-vendor-status","api\\vendor_ct@vendorstatuschange");
    Route::post("change-product-status","api\\vendor_ct@productstatuschange");
    Route::post("createPayoutRequest","api\\vendor_ct@createPayoutRequest");
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

    // driver Modules
    Route::post("get-driver","api\\drivers_ct@get_driver");
    Route::post("add-driver","api\\drivers_ct@create_driver");
    Route::post("login-driver","api\\drivers_ct@login_driver");
    Route::post("get-driver-otp","api\\drivers_ct@get_otp");
    Route::post("match-driver-otp","api\\drivers_ct@match_otp");
    Route::post("save-driver-vehicle","api\\drivers_ct@create_driver_vehicle");
    Route::post("edit-driver-vehicle","api\\drivers_ct@create_driver_vehicle");
    Route::post("upload-driver-vehicle","api\\drivers_ct@upload_vehicle_documents");
    Route::post("edit-driver","api\\drivers_ct@edit_driver");
    Route::post("delete-driver","api\\drivers_ct@delete_driver");

    Route::post("save-driver-payment","api\\drivers_ct@saveDriverPayment");
    Route::post("get-driver-payment","api\\drivers_ct@getDriverPayment");
    Route::post("assign-driver","api\\drivers_ct@assignDriver");
    Route::post("manual-assign-driver","api\\drivers_ct@assignDriver");
    Route::post("get-driver-balance/{id}","api\\drivers_ct@getBalance");
    Route::post("get-delivery-amount","api\\drivers_ct@calculateDeliveryCharge");
    Route::post("get-driver-earning","api\\drivers_ct@calculateDriverEaring");
    Route::post("createDriverTransaction","api\\drivers_ct@createDriverTransaction");
    Route::post("getDriverTransactions/{id}","api\\drivers_ct@getDriverTransactions");



    Route::post("get-driver-orders","api\\drivers_ct@getDriverOrders");
    Route::post("get-driver-requests","api\\drivers_ct@getDriverOrderRequests");
    Route::post("accept-driver-requests","api\\drivers_ct@acceptOrderRequests");
    Route::post("reject-driver-requests","api\\drivers_ct@rejectOrderRequests");




    // Coupon Modules
    Route::post("get-coupons","api\\coupons_ct@getcoupons");
    Route::post("get-bankoffers","api\\coupons_ct@getbankoffers");

    // System Modules
    Route::post("get-productfields","api\\system_ct@getproductfields");
    Route::post("get-vendortypes","api\\system_ct@getvendortypes");
    Route::post("get-vendorcategories","api\\system_ct@getvendorcategories");

    // Plans Modules
    Route::post("get-vendorsponsoredplans","api\\plan_ct@getvendorsponsoredplans");
    Route::post("get-vendorfeaturedplans","api\\plan_ct@getvendorfeaturedplans");

	 //Order Status Change
     Route::post('/changeorderstatus', 'api\\CartController@changeorderstatus')->name('changeorderstatus');

});

/* ************* Vendor APIs ************************** */
// Vendor Registration Process
Route::post('/vendorsignup', 'api\\VendorController@vendorsignup')->name('vendorsignup');
Route::post('/vendorotpverification', 'api\\VendorController@vendorotpverification')->name('vendorotpverification');
Route::post('/vendorotp', 'api\\VendorController@vendorOTP')->name('vendorOTP');

Route::post('/vendorsavestoreinfo', 'api\\VendorController@vendorsavestoreinfo')->name('vendorsavestoreinfo');
Route::post('/vendorsavestorelocation', 'api\\VendorController@vendorsavestorelocation')->name('vendorsavestorelocation');
Route::get('/getdomaintldlist', 'api\\VendorController@getdomaintldlist')->name('getdomaintldlist');
Route::post('/vendorsavedomainurl', 'api\\VendorController@vendorsavedomainurl')->name('vendorsavedomainurl');
Route::post('/vendoruploaddocument', 'api\\VendorController@vendoruploaddocument')->name('vendoruploaddocument');
Route::post('/updatevendorstatus', 'api\\VendorController@updatevendorstatus')->name('updatevendorstatus');
Route::post('/setdeliverydistance', 'api\\VendorController@setdeliverydistance')->name('setdeliverydistance');
Route::post('/setprintsetting', 'api\\VendorController@setprintsetting')->name('setprintsetting');
Route::post('/updatepreorderstatus', 'api\\VendorController@updatepreorderstatus')->name('updatepreorderstatus');
Route::post('/updatestoredetail', 'api\\VendorController@updatestoredetail')->name('updatestoredetail');
Route::post('/updatestoreimages', 'api\\VendorController@updatestoreimages')->name('updatestoreimages');

// Vendor Login
Route::post('/vendorsignin', 'api\\VendorController@vendorsignin')->name('vendorsignin');

// Vendor Profile
Route::get('/vendorgetprofile', 'api\\VendorController@vendorgetprofile')->name('vendorgetprofile');
Route::post('/vendoreditprofile', 'api\\VendorController@vendoreditprofile')->name('vendoreditprofile');
Route::get('/vendorchangepassword', 'api\\VendorController@vendorchangepassword')->name('vendorchangepassword');

// Category
Route::post('/addcategory', 'api\\CategoryController@addcategory')->name('addcategory');
Route::get('/getcategorylist', 'api\\CategoryController@getcategorylist')->name('getcategorylist');
Route::post('/editcategory', 'api\\CategoryController@editcategory')->name('editcategory');
Route::post('/deletecategory', 'api\\CategoryController@deletecategory')->name('deletecategory');

// Sub Category
Route::post('/addsubcategory', 'api\\SubcategoryController@addsubcategory')->name('addsubcategory');
Route::get('/getsubcategorylist', 'api\\SubcategoryController@getsubcategorylist')->name('getsubcategorylist');
Route::post('/editsubcategory', 'api\\SubcategoryController@editsubcategory')->name('editsubcategory');
Route::post('/deletesubcategory', 'api\\SubcategoryController@deletesubcategory')->name('deletesubcategory');

// product
Route::post('/addproduct', 'api\\ProductController@addproduct')->name('addproduct');
Route::post('/editproduct', 'api\\ProductController@editproduct')->name('editproduct');
Route::post('/addproductattribute', 'api\\ProductController@addproductattribute')->name('addproductattribute');
Route::post('/addattributevariant', 'api\\ProductController@addattributevariant')->name('addattributevariant');
Route::get('/getproductattributevariant', 'api\\ProductController@getproductattributevariant')->name('getproductattributevariant');
Route::get('/getvendorproducts', 'api\\ProductController@getvendorproducts')->name('getvendorproducts');

// Addon product
Route::post('/addaddonproduct', 'api\\AddonproductController@addaddonproduct')->name('addaddonproduct');
Route::post('/editaddonproduct', 'api\\AddonproductController@editaddonproduct')->name('editaddonproduct');

// Get Coupons
Route::get('/getvendorcouponlist', 'api\\CouponController@getvendorcouponlist')->name('getvendorcouponlist');
Route::post('/addvendorcoupon', 'api\\CouponController@addvendorcoupon')->name('addvendorcoupon');

// Get Vendor Bank List
Route::get('/getvendorbanklist', 'api\\BankController@getvendorbanklist')->name('getvendorbanklist');
Route::post('/addvendorbank', 'api\\BankController@addvendorbank')->name('addvendorbank');

// Get Vendor UPI List
Route::get('/getvendorupilist', 'api\\BankController@getvendorupilist')->name('getvendorupilist');
Route::post('/addvendorupi', 'api\\BankController@addvendorupi')->name('addvendorupi');

// Tax
Route::post('/addvendortax', 'api\\TaxController@addvendortax')->name('addvendortax');
Route::get('/getvendortaxlist', 'api\\TaxController@getvendortaxlist')->name('getvendortaxlist');

// Plans
Route::get('/getPlansList', 'api\\VendorController@getPlansList')->name('getPlansList');

//Invoices
Route::post('/getvendorinvoices', 'api\\VendorController@getvendorinvoices')->name('getvendorinvoices');
Route::post('/getvendorinvoicedetails', 'api\\VendorController@getvendorinvoicedetails')->name('getvendorinvoicedetails');

//Payout
Route::post('/getvendorpayoutlist', 'api\\VendorController@getvendorpayoutlist')->name('getvendorpayoutlist');
Route::post('/getvendorpayoutdetail', 'api\\VendorController@getvendorpayoutdetail')->name('getvendorpayoutdetail');

//Vendor Orders
Route::post('/getvendororders', 'api\\VendorController@getvendororders')->name('getvendororders');

/* ************* Vendor APIs ************************** */


/* ************* User APIs ************************** */
// User Registration Process
Route::post('/usersignup', 'api\\UserController@usersignup')->name('usersignup');
Route::post('/userotpverification', 'api\\UserController@userotpverification')->name('userotpverification');
Route::post('/userotp', 'api\\UserController@userOTP')->name('userOTP');

// User Login
Route::post('/usersignin', 'api\\UserController@usersignin')->name('usersignin');

// User Profile
Route::get('/getuserprofile', 'api\\UserController@getuserprofile')->name('getuserprofile');
Route::post('/edituserprofile', 'api\\UserController@edituserprofile')->name('edituserprofile');

// Get Category
Route::get('/getcategory', 'api\\CategoryController@getcategory')->name('getcategory');

// Sub Category
Route::get('/getsubcategory', 'api\\SubcategoryController@getsubcategory')->name('getsubcategory');

// Vendor
Route::get('/getvendorlist', 'api\\VendorController@getvendorlist')->name('getvendorlist');

// User Address
Route::get('/getuseraddress', 'api\\UserController@getuseraddress')->name('getuseraddress');
Route::post('/adduseraddress', 'api\\UserController@adduseraddress')->name('adduseraddress');
Route::post('/edituseraddress', 'api\\UserController@edituseraddress')->name('edituseraddress');

//Cart
Route::post('/addtocart', 'api\\CartController@addtocart')->name('addtocart');
Route::post('/updatecart', 'api\\CartController@updatecart')->name('updatecart');
Route::post('/getusercart', 'api\\CartController@getusercart')->name('getusercart');
Route::post('/deletecartitem', 'api\\CartController@deletecartitem')->name('deletecartitem');

//Place order
Route::post('/placeorder', 'api\\CartController@placeorder')->name('placeorder');
Route::post('/dineinorder', 'api\\CartController@dineinorder')->name('dineinorder');
Route::post('/tablebookingorder', 'api\\CartController@tablebookingorder')->name('tablebookingorder');

//Add Prescription
Route::post('/addprescription', 'api\\UserController@addprescription')->name('addprescription');

//Orders
Route::get('/getuserorders', 'api\\UserController@getuserorders')->name('getuserorders');
Route::get('/getuserorderdetails', 'api\\UserController@getuserorderdetails')->name('getuserorderdetails');

/* ************* User APIs ************************** */

Route::post("savefcm","api\\saveFCM@index");

// Settings Modules
Route::post("get-productunits","api\\config_ct@getproductunits");
Route::post("get-gatewayinfo","api\\config_ct@getGatewayInfo");
Route::post("get-deliveryradius","api\\config_ct@deliveryradius");
Route::post("get-smssettings","api\\config_ct@smssettings");
Route::post("get-smstemplates","api\\config_ct@smstemplates");
Route::post("get-whatsappsettings","api\\config_ct@whatsappsettings");
Route::post("get-mapsettings","api\\config_ct@mapssettings");
Route::post("get-powerbytext","api\\config_ct@powerbytext");
Route::post("get-vendorwebconfigure","api\\config_ct@vendorwebconfigure");
Route::post("get-appsettings","api\\config_ct@appsettings");

