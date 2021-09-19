<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\appuser;
use App\Models\paymentmethod;

class appuser_ct extends Controller
{
    function create_appuser(Request $request)
    {
        if(!$request->name){
        return  json_encode(["status"=>201,"message"=>__("Name Not Found")]);

        }
        if(!$request->phone){
        return  json_encode(["status"=>201,"message"=>__("Phone Not Found")]);

        }
        if(!$request->password){
        return  json_encode(["status"=>201,"message"=>__("Password Not Found")]);
        }
        if(appuser::where("phone",$request->phone)->first()){
             return  json_encode(["status"=>201,"message"=>__("Phone already exists!")]);


        }
        $vendor = new appuser;
        $vendor->name = $request->name;
        $vendor->phone = $request->phone;
        $vendor->email = '';
        $vendor->address = '';
        $vendor->otp_verified = 0;
        $vendor->map_longitude = '';
        $vendor->map_lattitude = '';
        $vendor->profile = '';
        $vendor->password = $request->password;
        if($vendor->save()){
            return json_encode(["status"=>200,"message"=>__("User Created Successfuly"),"data"=>appuser::find($vendor->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Create User")]);
        }
    }
    function get_appuser(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(appuser::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>appuser::find($request->key),"paymentmethod"=>paymentmethod::where("userid",$request->key)]);
            }else{
                return json_encode(appuser::get());
            }
        }

    }
    function delete_appuser(Request $request)
    {
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            $vendor = appuser::find($request->id);
            if($vendor){
            if($vendor->delete()){
                return json_encode(["status"=>200,"message"=>__("User Deleted Successfuly")]);
            }else{
                return json_encode(["status"=>202,"message"=>__("Failed to Delete User")]);
            }
            }else{
            return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
    }
    function update_appuser(Request $request)
    {
        if($request->id)
        {
        if($appuser = appuser::find($request->id)){
        $appuser->name = $request->name?$request->name:$appuser->name;
        $appuser->email = $request->email?$request->email:$appuser->email;
        if($request->email && appuser::where([["email",$request->email],["id","!=",$request->id]])->first())
        {
        return  json_encode(["status"=>201,"message"=>__("Email already exists")]);

        }
        if($request->phone && appuser::where([["phone",$request->phone],["id","!=",$request->id]])->first())
        {
        return  json_encode(["status"=>201,"message"=>__("Phone already exists")]);

        }
        $appuser->phone = $request->phone?$request->phone:$appuser->phone;
        $appuser->password = $request->password?$request->password:$appuser->password;
        $appuser->otp_verified = $request->otp_verified?$request->otp_verified:$appuser->otp_verified;
        $appuser->address = $request->address?$request->address:$appuser->address;
        $appuser->map_lattitude = $request->map_lattitude?$request->map_lattitude:$appuser->map_lattitude;
        $appuser->map_longitude = $request->map_longitude?$request->map_longitude:$appuser->map_longitude;

        if ($request->hasFile('profile'))
        {
                $r = $request->file('profile')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('profile')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
                if($appuser->profile)
                {
                    if(file_exists(public_path() . "/../".$appuser->profile)){
                    unlink(public_path() . "/../".$appuser->profile);
                    }
                }
            $appuser->profile = "/public/asset/".$file;
        }

        if($appuser->save()){
            return json_encode(["status"=>200,"message"=>__("User Saved Successfuly"),"data"=>appuser::find($appuser->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Save User")]);
        }

        }else{
            return  json_encode(["status"=>202,"message"=>__("Id Not Matched")]);
        }


        }else{
            return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
        }
    }
}
