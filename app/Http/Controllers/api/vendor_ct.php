<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\uservendor;
use Illuminate\Http\Request;
use App\Models\domain;

class vendor_ct extends Controller
{
    function create_vendor(Request $request){
        if(!$request->name){
        return  json_encode(["status"=>201,"message"=>__("Name Not Found")]);

        }
        if(!$request->email){
        return  json_encode(["status"=>201,"message"=>__("Email Not Found")]);

        }
        if(!$request->password){
        return  json_encode(["status"=>201,"message"=>__("Password Not Found")]);
        }
        if(uservendor::where("email",$request->email)->first()){
             return  json_encode(["status"=>201,"message"=>__("Email already exists!")]);


        }
        $vendor = new uservendor;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = $request->password;
        if($vendor->save()){
            return json_encode(["status"=>200,"message"=>__("Vendor Created Successfuly"),"data"=>uservendor::find($vendor->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Create Vendor")]);
        }

    }

    function get_vendor(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(uservendor::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>201,"data"=>uservendor::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(uservendor::get());
            }
        }

    }
    function delete_vendor(Request $request)
    {
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            $vendor = uservendor::find($request->id);
            if($vendor){
            if($vendor->delete()){
                return json_encode(["status"=>200,"message"=>__("Vendor Deleted Successfuly")]);
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
        if($vendor = uservendor::find($request->id)){
        $vendor->name = $request->name?$request->name:$vendor->name;
        $vendor->email = $request->email?$request->email:$vendor->email;
        if($request->email && uservendor::where([["email",$request->email],["id","!=",$request->id]])->first())
        {
        return  json_encode(["status"=>201,"message"=>__("Email already exists")]);

        }
        $vendor->password = $request->password?$request->password:$vendor->password;
        $vendor->otp_verified = $request->otp_verified?$request->otp_verified:$vendor->otp_verified;
        $vendor->store_name = $request->store_name?$request->store_name:$vendor->store_name;
        $vendor->store_category = $request->store_category?$request->store_category:$vendor->store_category;
        $vendor->store_category_id = $request->store_category_id?$request->store_category_id:$vendor->store_category_id;
        $vendor->country_code = $request->country_code?$request->country_code:$vendor->country_code;
        $vendor->whatsapp = $request->whatsapp?$request->whatsapp:$vendor->whatsapp;
        $vendor->phone = $request->phone?$request->phone:$vendor->phone;
        $vendor->address = $request->address?$request->address:$vendor->address;
        $vendor->url = $request->url?$request->url:$vendor->url;
        $vendor->map_lattitude = $request->map_lattitude?$request->map_lattitude:$vendor->map_lattitude;
        $vendor->map_longitude = $request->map_longitude?$request->map_longitude:$vendor->map_longitude;
        $vendor->shop_in_app = $request->shop_in_app?$request->shop_in_app:$vendor->shop_in_app;

        if ($request->hasFile('logo'))
        {
                $r = $request->file('logo')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('logo')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
                if($vendor->logo)
                {
                    if(file_exists(public_path() . "/../".$vendor->logo)){
                    unlink(public_path() . "/../".$vendor->logo);
                    }  

                }
            $vendor->logo = "/public/asset/".$file;
        }
        if ($request->hasFile('featured_image'))
        {
                $r = $request->file('featured_image')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('featured_image')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
                if($vendor->featured_image)
                {
                    if(file_exists(public_path() . "/../".$vendor->featured_image)){
                    unlink(public_path() . "/../".$vendor->featured_image);
                    }
                }
            $vendor->featured_image = "/public/asset/".$file;
        }

        if($vendor->save()){
            return json_encode(["status"=>200,"message"=>__("Vendor Saved Successfuly"),"data"=>uservendor::find($vendor->id)]);
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
}
