<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Notification;
use App\Models\Product;
use App\Models\smstemplate;
use App\Models\Vendor;
use App\Models\vendorpayout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\domain;

class vendor_ct extends Controller
{
    function approve_payout(Request $request)
    {
        if($request->text){
            if ($request->id)
            {
                if($payout = vendorpayout::find($request->id)){
                    $text = "";
                    if($request->text == "Accept"){
                        $payout->requestStatus = 1;
                        $text = "Rejected";
                    }
                    if($request->text == "Reject"){
                        $payout->requestStatus = 2;
                        $text = "Accepted";

                    }
                    if($payout->save()){
                        // if you want to perform any actions now you can create a use this function;
                        $this->payout($request->id, $text);
                        return response()->json(
                            [
                                "status"=>200,
                                "message"=>__("Changed Successfully."),
                                "text"=>$text
                            ],
                        );
                    }else{
                        return response()->json(
                            [
                                "status"=>201,
                                "message"=>__("Failed To Save it"),
                            ],
                        );
                    }
                }
                return response()->json(
                    [
                        "status"=>201,
                        "message"=>__("Id Not Matched")
                    ],
                );

            }
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("Id Not Found")
                ],
            );

        }
        return response()->json(
            [
                "status"=>201,
                "message"=>__("Text Not Found")
            ],
        );
    }
    function createPayoutRequest(Request $request)
    {
        $payout = new vendorpayout;
        if($request->vendorId && vendor::find($request->vendorId)){
            $payout->vendorId = $request->vendorId;
        }else{
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("Vendor Id Not Found")
                ],
            );
        }
        if($request->requestAmount){
            $payout->requestAmount = $request->requestAmount;
        }else{
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("requestAmount Not Found")
                ],
            );
        }
        if($request->totalCommission){
            $payout->totalCommission = $request->totalCommission;
        }else{
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("totalCommission Not Found")
                ],
            );
        }
        if($request->paymentMethod){
            $payout->paymentMethod = $request->paymentMethod;
        }else{
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("paymentMethod Not Found")
                ],
            );
        }

        $payout->requestDate = date("Y-m-d H:i:s");
        $payout->transactionId = sha1(time());
        $payout->requestStatus = 0;
        $payout->ActionTakenDate = null;
        $payout->adminComments = "";

        if ($payout->save()){
            return response()->json(
                [
                    "status"=>200,
                    "message"=>__("Request Saved"),
                    "data"=>$payout
                ],
            );
        }else{
            return response()->json(
                [
                    "status"=>200,
                    "message"=>__("Failed to Proccess Request"),
                    "data"=>$payout
                ],
            );
        }

    }
    function vendorstatuschange(Request $request)
    {
        if ($request->id)
        {
            if($payout = vendor::find($request->id)){
                $payout->vendorStatus = $request->val;

                if($payout->save()){
                    $Notification = new Notification;
                    $successMessage = "";
                    if($payout->vendorStatus == 1){
                        $successMessage = smstemplate::where("message_id","zyroxactivatedvendor")->first();
                    }
                    if($payout->vendorStatus == 2){
                        $successMessage = smstemplate::where("message_id","zyroxvendordecline")->first();
                    }
                    $successMessageText = str_replace(array("{#var#}"),array($payout->vendorName),$successMessage->message);
                    $successMessageTemplateId = $successMessage->template_id;
                    $Notification->setMessage($successMessageText);
                    $Notification->setPath($payout->vendorCountryCode.$payout->vendorContactNumber);
                    $Notification->setTitle("ZYX Notification");
                    $Notification->setImage(url("public/image/header.png"));
                    $Notification->TemplateId = $successMessageTemplateId;
                    $Notification->sendSMS();
                    $Notification->sendEmail();
                    $Notification->sendFCM();
                    return response()->json(
                        [
                            "status"=>200,
                            "message"=>__("Changed Successfully."),
                        ],
                    );
                }else{
                    return response()->json(
                        [
                            "status"=>201,
                            "message"=>__("Failed To Save it"),
                        ],
                    );
                }
            }
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("Id Not Matched")
                ],
            );

        }
        return response()->json(
            [
                "status"=>201,
                "message"=>__("Id Not Found")
            ],
        );


    }
    function productstatuschange(Request $request)
    {
        if ($request->id)
        {
            if($payout = product::find($request->id)){
                $payout->productStatus = $request->val;

                if($payout->save()){
                    // if you want to perform any actions now you can create a use this function;
//                        $this->payout($request->id, $text);
                    $status = "Active";
                    $badge = "success";
                    if($request->val==0){
                        $status = "Inactive";
                        $badge = "secondary";
                    }
                    if($request->val==2){
                        $status = "Pending";
                        $badge = "warning";
                    }
                    if($request->val==3){
                        $status = "Rejected";
                        $badge = "danger";
                    }

                    return response()->json(
                        [
                            "status"=>200,
                            "p_status"=>$status,
                            "badge"=>$badge,
                            "message"=>__("Changed Successfully."),
                        ],
                    );
                }else{
                    return response()->json(
                        [
                            "status"=>201,
                            "message"=>__("Failed To Save it"),
                        ],
                    );
                }
            }
            return response()->json(
                [
                    "status"=>201,
                    "message"=>__("Id Not Matched")
                ],
            );

        }
        return response()->json(
            [
                "status"=>201,
                "message"=>__("Id Not Found")
            ],
        );


    }


    function create_vendor(Request $request){
        if(!$request->vendorName){
            return  json_encode(["status"=>201,"message"=>__("Name Not Found")]);

        }

        if(!$request->password){
            return  json_encode(["status"=>201,"message"=>__("Password Not Found")]);
        }
        if(vendor::where("vendorEmail",$request->vendorEmail)->first()){
            return  json_encode(["status"=>201,"message"=>__("Email already exists!")]);


        }
        $vendor = new vendor;
        $vendor->vendorName = $request->vendorName?$request->vendorName:"";
        $vendor->vendorEmail = $request->vendorEmail?$request->vendorEmail:"";
        if($request->vendorEmail && vendor::where([["vendorEmail",$request->vendorEmail],["id","!=",$request->vendor_id]])->first())
        {
            return redirect('/edit/vendor/'.$request->vendor_id)->with('failed','Email already exists');

        }
        $vendor->vendorCategory = $request->vendorCategory?$request->vendorCategory:"";
        $vendor->vendorType = $request->vendorType?$request->vendorType:"";
        $vendor->isOtpVerify = $request->isOtpVerify?$request->isOtpVerify:"";
        $vendor->storeName = $request->storeName?$request->storeName:"";
        $vendor->gstNumber = $request->gstNumber?$request->gstNumber:"";
        $vendor->storeCounty = $request->storeCounty?$request->storeCounty:"";
        $vendor->storeCity = $request->storeCity?$request->storeCity:"";
        $vendor->storeAddress = $request->storeAddress?$request->vendorCategory:"";
        $vendor->vendorCountryCode = $request->vendorCountryCode?$request->vendorCountryCode:"";
        $vendor->vendorContactNumber = $request->vendorContactNumber?$request->vendorContactNumber:"";
        $vendor->storeLatitude = $request->storeLatitude?$request->storeLatitude:"";
        $vendor->storeLongitude = $request->storeLongitude?$request->storeLongitude:"";
        $vendor->vendorDomainUrl = $request->vendorDomainUrl?$request->vendorDomainUrl:"";
        $vendor->vendorStatus = $request->vendorStatus?$request->vendorStatus:"";


        if ($request->hasFile('storeWebLogo'))
        {
            $r = $request->file('storeWebLogo')
                ->getPathName();
            // Save the image
            $path = public_path() . "/uploads/storeweblogo/";
            $file = time() . rand() . $request->file('storeWebLogo')
                    ->getClientOriginalName();
            move_uploaded_file($r, $path . $file);

            $vendor->storeWebLogo = $file;
        }
        if ($request->hasFile('storeAppLogo'))
        {
            $r = $request->file('storeAppLogo')
                ->getPathName();
            // Save the image
            $path = public_path() . "/uploads/storeapplogo/";
            $file = time() . rand() . $request->file('storeAppLogo')
                    ->getClientOriginalName();
            move_uploaded_file($r, $path . $file);

            $vendor->storeAppLogo = $file;
        }
        if($vendor->save()){
            return json_encode(["status"=>200,"message"=>__("Vendor Created Successfully"),"data"=>vendor::find($vendor->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Create Vendor")]);
        }

    }

    function get_vendor(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(vendor::where($request->handle,$request->key)->get());
            }else{
                return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>vendor::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(vendor::get());
            }
        }

    }
    function delete_vendor(Request $request)
    {
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            $vendor = vendor::find($request->id);
            if($vendor){
                if($vendor->delete()){
                    return json_encode(["status"=>200,"message"=>__("Vendor Deleted Successfully")]);
                }else{
                    return json_encode(["status"=>202,"message"=>__("Failed to Delete Vendor")]);
                }
            }else{
                return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
    }

    function update_vendor(Request $request)
    {
        if($request->id)
        {
            if($vendor = vendor::find($request->id)){
                $vendor->vendorName = $request->vendorName?$request->vendorName:$vendor->vendorName;
                $vendor->vendorEmail = $request->vendorEmail?$request->vendorEmail:$vendor->vendorEmail;
                if($request->vendorEmail && vendor::where([["vendorEmail",$request->vendorEmail],["id","!=",$request->vendor_id]])->first())
                {
                    return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','Email already exists');

                }
                $vendor->vendorCategory = $request->vendorCategory?$request->vendorCategory:$vendor->vendorCategory;
                $vendor->vendorType = $request->vendorType?$request->vendorType:$vendor->vendorType;
                $vendor->isOtpVerify = $request->isOtpVerify?$request->isOtpVerify:$vendor->isOtpVerify;
                $vendor->storeName = $request->storeName?$request->storeName:$vendor->storeName;
                $vendor->gstNumber = $request->gstNumber?$request->gstNumber:$vendor->gstNumber;
                $vendor->storeCounty = $request->storeCounty?$request->storeCounty:$vendor->storeCounty;
                $vendor->storeCity = $request->storeCity?$request->storeCity:$vendor->storeCity;
                $vendor->storeAddress = $request->storeAddress?$request->vendorCategory:$vendor->storeAddress;
                $vendor->vendorCountryCode = $request->vendorCountryCode?$request->vendorCountryCode:$vendor->vendorCountryCode;
                $vendor->vendorContactNumber = $request->vendorContactNumber?$request->vendorContactNumber:$vendor->vendorContactNumber;
                $vendor->storeLatitude = $request->storeLatitude?$request->storeLatitude:$vendor->storeLatitude;
                $vendor->storeLongitude = $request->storeLongitude?$request->storeLongitude:$vendor->storeLongitude;
                $vendor->vendorDomainUrl = $request->vendorDomainUrl?$request->vendorDomainUrl:$vendor->vendorDomainUrl;
                $vendor->vendorStatus = $request->vendorStatus?$request->vendorStatus:0;


                if ($request->hasFile('storeWebLogo'))
                {
                    $r = $request->file('storeWebLogo')
                        ->getPathName();
                    // Save the image
                    $path = public_path() . "/uploads/storeweblogo/";
                    $file = time() . rand() . $request->file('storeWebLogo')
                            ->getClientOriginalName();
                    move_uploaded_file($r, $path . $file);
                    if($vendor->storeWebLogo)
                    {
                        if(file_exists(public_path() . "/../".$vendor->storeWebLogo)){
                            unlink(public_path() . "/../".$vendor->storeWebLogo);
                        }

                    }
                    $vendor->storeWebLogo = $file;
                }
                if ($request->hasFile('storeAppLogo'))
                {
                    $r = $request->file('storeAppLogo')
                        ->getPathName();
                    // Save the image
                    $path = public_path() . "/uploads/storeapplogo/";
                    $file = time() . rand() . $request->file('storeAppLogo')
                            ->getClientOriginalName();
                    move_uploaded_file($r, $path . $file);
                    if($vendor->storeAppLogo)
                    {
                        if(file_exists(public_path() . "/../".$vendor->storeAppLogo)){
                            unlink(public_path() . "/../".$vendor->storeAppLogo);
                        }
                    }
                    $vendor->storeAppLogo = $file;
                }

                if($vendor->save()){
                    return json_encode(["status"=>200,"message"=>__("Vendor Saved Successfully"),"data"=>vendor::find($vendor->id)]);
                }else{
                    return  json_encode(["status"=>201,"message"=>__("Failed to Save Vendor")]);
                }

            }else{
                return  json_encode(["status"=>202,"message"=>__("Id Not Matched")]);
            }


        }else{
            return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
        }
    }

    private function payout($id, string $text)
    {
    }
}
