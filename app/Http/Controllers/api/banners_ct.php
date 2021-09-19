<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\uservendor;
use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\domain;
use App\Models\bannerCategories;
use App\Models\bannerlocation;


class banners_ct extends Controller
{
    function get_banners(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(banner::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>banner::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(banner::get());
            }
        }

    }
    function get_banner_category(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(bannerCategories::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>bannerCategories::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(bannerCategories::get());
            }
        }

    }
    function get_banner_location(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(bannerlocation::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>bannerlocation::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(bannerlocation::get());
            }
        }

    }
    function create_banners(Request $request){
        
        if(!$request->name){
        return  json_encode(["status"=>201,"message"=>__("Name Not Found")]);

        }
        if(!$request->category_id){
        return  json_encode(["status"=>201,"message"=>__("category id Not Found")]);

        }
        if(!$request->location_id){
        return  json_encode(["status"=>201,"message"=>__("location id Not Found")]);
        }
        if(!$request->status){
            return  json_encode(["status"=>201,"message"=>__("status id Not Found")]);
        }
        $banners = new banner;
        $banners->name          = $request->name;
        $banners->image         = $request->image;
        $banners->category_id   = $request->category_id;
        $banners->location_id   = $request->location_id;
        $banners->status        = $request->status;;
        if($banners->save()){
            return json_encode(["status"=>200,"message"=>__("banners Created Successfuly"),"data"=>banner::find($banners->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Create banners")]);
        }
    }
    function update_banners(Request $request)
    {
        $banners_id = $request->id;
        if($banners_id)
        {
            //dd($request->all());
            if($banner = banner::find($banners_id)){
                $banner->name           = $request->name?$request->name:$banner->name;
                $banner->image          = $request->image?$request->image:$banner->image;
                $banner->category_id    = $request->category_id?$request->category_id:$banner->category_id;  
                $banner->location_id    = $request->location_id?$request->location_id:$banner->location_id;
                $banner->status         = $request->status?$request->status:$banner->status;        
            
                if($banner->save()){
                    return json_encode(["status"=>200,"message"=>__("banner update  Successfuly"),"data"=>banner::find($banner->id)]);
                }else{
                    return  json_encode(["status"=>201,"message"=>__("Failed to update banner")]);
                }
            }else{
                return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
            }
        }else{
            return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
        }

        // if ($request->hasFile('logo'))
        // {
        //         $r = $request->file('logo')
        //             ->getPathName();
        //         // Save the image
        //         $path = public_path() . "/asset/";
        //         $file = time() . rand() . $request->file('logo')
        //             ->getClientOriginalName();
        //         move_uploaded_file($r, $path . $file);
        //         if($vendor->logo)
        //         {
        //             if(file_exists(public_path() . "/../".$vendor->logo)){
        //             unlink(public_path() . "/../".$vendor->logo);
        //             }  

        //         }
        //     $vendor->logo = "/public/asset/".$file;
        // }
        // if ($request->hasFile('featured_image'))
        // {
        //         $r = $request->file('featured_image')
        //             ->getPathName();
        //         // Save the image
        //         $path = public_path() . "/asset/";
        //         $file = time() . rand() . $request->file('featured_image')
        //             ->getClientOriginalName();
        //         move_uploaded_file($r, $path . $file);
        //         if($vendor->featured_image)
        //         {
        //             if(file_exists(public_path() . "/../".$vendor->featured_image)){
        //             unlink(public_path() . "/../".$vendor->featured_image);
        //             }
        //         }
        //     $vendor->featured_image = "/public/asset/".$file;
        // }

        // if($vendor->save()){
        //     return json_encode(["status"=>200,"message"=>__("Vendor Saved Successfuly"),"data"=>uservendor::find($vendor->id)]);
        // }else{
        //     return  json_encode(["status"=>201,"message"=>__("Failed to Save Vendor")]);
        // }

        // }else{
        //     return  json_encode(["status"=>202,"message"=>__("Id Not Matched")]);
        // }


        // }else{
        //     return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
        // }
    }
    function delete_banners(Request $request)
    {
        
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            
            $banners = banner::find($request->id);
            //dd('sssss');
            if($banners){
                if($banners->delete()){
                    return json_encode(["status"=>200,"message"=>__("Banners Deleted Successfuly")]);
                }else{
                    return json_encode(["status"=>202,"message"=>__("Failed to Delete Banners")]);
                }
            }else{
                return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
    }

}
