<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\domain;
use App\Models\uservendor;

class domain_ct extends Controller
{
    function check_domain(Request $request){
        if($request->domain){
            if(!$this->is_valid_domain_name($request->domain)){
                return json_encode(["status"=>202,"message"=>__("Domain name is not valid")]);
            }else{
                if($domain = domain::where("domain_name",$request->domain)->first()){
                    return json_encode(["status"=>202,"message"=>__("Domain name is not available")]);
                }else{
                    return json_encode(["status"=>200,"message"=>$request->domain.__(" is available")]);
                }
            }
        }else{
            return json_encode(["status"=>201,"message"=>__("`domain` param is required")]);
        }
    }
    function get_domain(Request $request){
        if($request->vendor_id){
            return json_encode(["status"=>200,"data"=> domain::where("vendor_id",$request->vendor_id)->get()]);
        }else{
            return json_encode(["status"=>200,"data"=> domain::get()]);
        }
    }
    function check_domain_algo($domain){
        if($domain){
            if(!$this->is_valid_domain_name($domain)){
                return false;
            }else{
                if($do = domain::where("domain_name",$domain)->first()){
                    return false;
                }else{
                    return true;
                }
            }
        }else{
            return false;
        }
    }
    function create_domain(Request $request)
    {
        if($request->domain){

        if($this->check_domain_algo($request->domain)){
            if(!$request->vendor_id){
                return json_encode(["status"=>202,"message"=>__("`vendor_id` param not found.")]);
            }else{
                if(!$vendor = uservendor::find($request->vendor_id)){
                    return json_encode(["status"=>202,"message"=>__("`vendor_id` not valid.")]);
                }
            }
            if($request->domain_type){
                if($request->domain_type=='Domain' || $request->domain_type=='Sub-Domain'){
                $domain = new domain;
                $domain->domain_name = $request->domain;
                $domain->domain_type = $request->domain_type;
                $domain->vendor_id = $request->vendor_id;
                if($domain->save()){
                if($request->domain_type=='Sub-Domain'){
                    $this->create_sub_domain($request->domain);
                }
                return json_encode(["status"=>200,"message"=>__("Domain Saved Successfuly."), "data"=> domain::find($domain->id)]);
                }else{
                return json_encode(["status"=>201,"message"=>__("Failed to save this action.")]);
                }
                }else{
                return json_encode(["status"=>202,"message"=>__("`domain_type` value is wrong. It should be either Domain or Sub-Domain.")]);

                }
            }else{
                return json_encode(["status"=>202,"message"=>__("`domain_type` param not found.")]);
            }
        }else{
            return json_encode(["status"=>202,"message"=>__("Domain is not valid or unavailable. Please check domain properly.")]);
        }
        }
            return json_encode(["status"=>202,"message"=>__("`domain` param not found.")]);
    }

    function is_valid_domain_name($domain_name)
    {
        return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
                && preg_match("/^.{1,253}$/", $domain_name) //overall length check
                && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
    }
    function delete_domain(Request $request)
    {
        if($request->vendor_id){
            if($vendor = uservendor::find($request->vendor_id)){
                if(!$domain = domain::where('vendor_id',$request->vendor_id)->first()){
                    return json_encode(["status"=>202,"message"=>__("No domain found")]);
                }

                if($domain->delete()){
                    return json_encode(["status"=>200,"message"=>__("Successfuly Deleted Domain")]);
                }
                    return json_encode(["status"=>201,"message"=>__("Failed to Delete Domain")]);
            }
            return json_encode(["status"=>202,"message"=>__("`vendor_id` param not found.")]);
        }else{
            return json_encode(["status"=>202,"message"=>__("`vendor_id` param not found.")]);
        }
    }

    function create_sub_domain($subdomain){

    }
}
