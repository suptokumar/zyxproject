<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use App\Models\bankoffer;
use Validator;

class coupons_ct extends Controller
{
    public function getcoupons(Request $request){
        $coupons = coupon::get();
            return response()->json(['status'=>200,'data'=>$coupons]);
    }
    public function getbankoffers(Request $request){
        $coupons = bankoffer::get();
            return response()->json(['status'=>200,'data'=>$coupons]);
    }
}
