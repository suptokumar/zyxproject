<?php

namespace App\Http\Controllers\ct\coupons;

use App\Http\Controllers\Controller;
use App\Models\bankoffer;
use App\Models\Vendor;
use Illuminate\Http\Request;

class bankoffers_ct extends Controller
{
    function bankoffers(){
        $allpages = bankoffer::get();
        foreach($allpages as $key => $page){
            $vendors = json_decode($page->vendors);
            $vendore = "";
            foreach($vendors as $vendor){
                $vendort = Vendor::find($vendor);
                $vendore .= $vendort->vendorName.",";
            }

            $allpages[$key]->gateway = Vendor::find($page->gateway)?Vendor::find($page->gateway)->vendorName:"Not Found";
            $allpages[$key]->vendor = substr($vendore,0,-1);
        }
        return view("bankoffers/coupons",['allpages'=>$allpages]);
    }
    function addbankoffers(){
        $vendors = Vendor::get();
        return view("bankoffers/addnew",['vendors'=>$vendors]);
    }
    function editbankoffers($id){
        $coupon = bankoffer::find($id);
        $vendors = Vendor::get();
        return view("bankoffers/editcoupons",['vendors'=>$vendors,'coupon'=>$coupon]);
    }
    function saveaddbankoffers(Request $request){
        $coupon = new bankoffer;
        if($request->name){ 
        $coupon->name = $request->name;
        }else{
            return back()->with("failed","Name Not Valid");
        }
        if($request->gateway){ 
        $coupon->gateway = $request->gateway;
        }else{
        $coupon->gateway = '';
        }
        if($request->value){ 
        $coupon->value = $request->value;
        }else{
            return back()->with("failed","Value Not Valid");
        }
        if($request->type){ 
        $coupon->type = $request->type;
        }else{
            return back()->with("failed","Type Not Valid");
        }
        if($request->description){ 
        $coupon->description = $request->description;
        }else{
            return back()->with("failed","Description Not Valid");
        }
        if($request->test){ 
        $coupon->test = $request->test;
        }else{
            return back()->with("failed","Test Not Valid");
        }
        if($request->min_amount){ 
        $coupon->min_amount = $request->min_amount;
        }else{
        $coupon->min_amount = 0;
        }
        if($request->vendors){ 
        $coupon->vendors = json_encode($request->vendors);
        }else{
        $coupon->vendors = json_encode([]);
        }

         if ($request->hasFile('icon'))
        {
                $r = $request->file('icon')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('icon')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
            $coupon->icon = "/public/asset/".$file;
        }else{
            $coupon->icon = "/public/image/logo.png";
        }

        if($coupon->save()){
            return redirect("/bankoffers")->with("successfully",__("Coupon Added Successfuly"));
        }






    }







    function saveeditbankoffers(Request $request){
        $coupon = bankoffer::find($request->id);
        if($request->name){ 
        $coupon->name = $request->name;
        }else{
            return back()->with("failed","Code Not Valid");
        }
        if($request->gateway){ 
        $coupon->gateway = $request->gateway;
        }else{
        $coupon->gateway = '';
        }
        if($request->value){ 
        $coupon->value = $request->value;
        }else{
            return back()->with("failed","Value Not Valid");
        }
        if($request->type){ 
        $coupon->type = $request->type;
        }else{
            return back()->with("failed","Type Not Valid");
        }
        if($request->description){ 
        $coupon->description = $request->description;
        }else{
            return back()->with("failed","Description Not Valid");
        }
        if($request->test){ 
        $coupon->test = $request->test;
        }else{
            return back()->with("failed","Test Not Valid");
        }
        if($request->min_amount){ 
        $coupon->min_amount = $request->min_amount;
        }else{
        $coupon->min_amount = 0;
        }
        if($request->vendors){ 
        $coupon->vendors = json_encode($request->vendors);
        }else{
        $coupon->vendors = json_encode([]);
        }

         if ($request->hasFile('icon'))
        {
                $r = $request->file('icon')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('icon')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
                if($coupon->icon)
                {
                    if(file_exists(public_path() . "/../".$coupon->icon)){
                    unlink(public_path() . "/../".$coupon->icon);
                    }  

                }
            $coupon->icon = "/public/asset/".$file;
        }

        if($coupon->save()){
            return back()->with("successfully",__("Coupon Saved Successfuly"));
        }else{
            return back()->with("failed","Failed to Save Coupon");
        }


    }
    function deletebankoffers(Request $request){
        $coupon = bankoffer::find($request->id);
        if($coupon->icon)
        {
            if(file_exists(public_path() . "/../".$coupon->icon)){
            unlink(public_path() . "/../".$coupon->icon);
            }  

        }
        if($coupon->delete()){
            return json_encode(["status"=>200,"message"=>__("Deleted Successfuly")]);
        }else{
            return json_encode(["status"=>201,"message"=>__("Failed to Delete")]);

        }
    }
}
