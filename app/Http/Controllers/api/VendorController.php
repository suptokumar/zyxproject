<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Validator;
use Illuminate\Support\Facades\Auth;  

class VendorController extends Controller
{
    /* vendor signup api */
    public function vendorsignup(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorName' => 'required', 
            'vendorCountryCode' => 'required', 
            'vendorContactNumber' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $reg = $request->all();
        $reg['password'] = bcrypt($reg['password']);
        $reg['vendorToken'] = md5(rand(1,999999)); 
        $reg['vendorOtp'] = rand(1111,9999); 

        $checkDuplicate = Vendor::query()
                                ->where('vendorContactNumber',$reg['vendorContactNumber'])
                                ->count();
        if($checkDuplicate <= 0){
            $vendorData = Vendor::create($reg); 

            $success['vendorId'] =  $vendorData->id;
            $success['vendorName'] =  $vendorData->vendorName;
            $success['vendorCountryCode'] =  $vendorData->vendorCountryCode;
            $success['vendorContactNumber'] =  $vendorData->vendorContactNumber;
            $success['vendorOtp'] =  $vendorData->vendorOtp;
            $success['vendorToken'] =  $vendorData->vendorToken;

            if($vendorData->id > 0){
                return response()->json(['status'=>1,'message'=>'Vendor Registered Successfully','response'=>$success]); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'Vendor Not Registered Successfully']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'Vendor Already Exists With This Info']); 
        }
    }

    /* vendor otp verification api */
    public function vendorotpverification(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
            'vendorOtp' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $otp = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($otp['vendorId'],$otp['vendorToken']);
        if($verifiedVendorId == $otp['vendorId']){
            $verifyOtp = Vendor::query()
                                    ->where('vendorOtp',$otp['vendorOtp'])
                                    ->where('id',$otp['vendorId'])
                                    ->count();

            if($verifyOtp > 0){
                $verify['isOtpVerify'] = 1;
                $vendorData = Vendoruser::where('id', '=', $otp['vendorId'])->update($verify);    

                if($vendorData){
                    return response()->json(['status'=>1,'message'=>'Vendor Verification Successfully']); 
                }
                else{
                    return response()->json(['status'=>0,'message'=>'Vendor Verification Code Is Not Match']); 
                }
            }
            else{
                return response()->json(['status'=>0,'message'=>'Vendor Verification Code Is Mismatch']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }

    /* vendor save store information api */
    public function vendorsavestoreinfo(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
            'storeName' => 'required',
            'gstNumber' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $store = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($store['vendorId'],$store['vendorToken']);
        if($verifiedVendorId == $store['vendorId']){
            $storeData['storeName'] = $store['storeName'];
            $storeData['gstNumber'] = $store['gstNumber'];

            if(isset($store["storeWebLogo"])){
                $storeWebLogo = $store["storeWebLogo"];
                $webLogo = $storeWebLogo->getClientOriginalName();
                $extension  = pathinfo($storeWebLogo->getClientOriginalName(), PATHINFO_EXTENSION);
                $webLogo = "storeweblogo".time().".".$extension;
                $uploadPath = public_path()."/uploads/storeweblogo";
                $storeWebLogo->move($uploadPath, $webLogo);
                $storeData['storeWebLogo'] = $webLogo;
            }

            if(isset($store["storeAppLogo"])){
                $storeAppLogo = $store["storeAppLogo"];
                $appLogo = $storeAppLogo->getClientOriginalName();
                $extension  = pathinfo($storeAppLogo->getClientOriginalName(), PATHINFO_EXTENSION);
                $appLogo = "storeapplogo".time().".".$extension;
                $uploadPath = public_path()."/uploads/storeapplogo";
                $storeAppLogo->move($uploadPath, $appLogo);
                $storeData['storeAppLogo'] = $appLogo;
            }

            $vendorStoreData = Vendor::where('id', '=', $store['vendorId'])->update($storeData);    

            if($vendorStoreData){
                return response()->json(['status'=>1,'message'=>'Vendor Store Information Save Successfully']); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'Vendor Store Information Not Saved']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }

    /* vendor save store location api */
    public function vendorsavestorelocation(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
            'storeCounty' => 'required',
            'storeCity' => 'required',
            'storeAddress' => 'required',
            'storeLatitude' => 'required',
            'storeLongitude' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $location = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($location['vendorId'],$location['vendorToken']);
        if($verifiedVendorId == $location['vendorId']){
            $storeLocationData['storeCounty'] = $location['storeCounty'];
            $storeLocationData['storeCity'] = $location['storeCity'];
            $storeLocationData['storeAddress'] = $location['storeAddress'];
            $storeLocationData['storeLatitude'] = $location['storeLatitude'];
            $storeLocationData['storeLongitude'] = $location['storeLongitude'];

            $vendorStoreLocationData = Vendor::where('id', '=', $location['vendorId'])->update($storeLocationData);    

            if($vendorStoreLocationData){
                return response()->json(['status'=>1,'message'=>'Vendor Store Location Save Successfully']); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'Vendor Store Location Not Saved']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }
  
  	/* vendor signin api */
    public function vendorsignin(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorCountryCode' => 'required', 
            'vendorContactNumber' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $login = $request->all();

        if (Auth::guard('apivendor')->attempt(['vendorContactNumber' => $login['vendorContactNumber'], 'password' => $login['password']], false)) {
      	
            $vendorData = Vendor::query()
                                ->where('id',Auth::guard('apivendor')->user()->id)
                                ->where('vendorStatus',1)
                                ->get();
                                
            if(count($vendorData) > 0){
                $updateToken['vendorToken'] = md5(rand(1,999999)); 
                Vendor::where('id', '=', Auth::guard('apivendor')->user()->id)->update($updateToken);  

                $success['vendorId'] =  $vendorData[0]->id;
                $success['vendorName'] =  $vendorData[0]->vendorName;
                $success['vendorCountryCode'] =  $vendorData[0]->vendorCountryCode;
                $success['vendorContactNumber'] =  $vendorData[0]->vendorContactNumber;
                $success['vendorToken'] =  $updateToken['vendorToken'];

                if($vendorData[0]->id > 0){
                    return response()->json(['status'=>1,'message'=>'Vendor Loggedin Successfully','response'=>$success]); 
                }
                
            }
            else{
                return response()->json(['status'=>0,'message'=>'Vendor Not Loggedin Successfully']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'Phone Number or Password is wrong']); 
        }
    }
}
