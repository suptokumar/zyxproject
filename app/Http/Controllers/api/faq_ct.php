<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\domain;
use App\Models\faqs;
use App\Models\faqCategory;

class faq_ct extends Controller
{
    function get_faq_category(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(faqCategory::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>faqCategory::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(faqCategory::get());
            }
        }

    }
    function get_faq(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(faqs::where($request->handle,$request->key)->get());
            }else{
        return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>faqs::find($request->key),"domain"=>domain::where("vendor_id",$request->key)]);
            }else{
                return json_encode(faqs::get());
            }
        }

    }
    function create_faq(Request $request){
        if(!$request->faq_category_id){
        return  json_encode(["status"=>201,"message"=>__("faq_category_id Not Found")]);

        }
        if(!$request->question){
        return  json_encode(["status"=>201,"message"=>__("question Not Found")]);

        }
        if(!$request->answer){
        return  json_encode(["status"=>201,"message"=>__("answer Not Found")]);
        }
        
        $faqs = new faqs;
        $faqs->faq_category_id    = $request->faq_category_id;
        $faqs->question           = $request->question;
        $faqs->answer             = $request->answer;
        if($faqs->save()){
            return json_encode(["status"=>200,"message"=>__("faqs Created Successfuly"),"data"=>faqs::find($faqs->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Create faqs")]);
        }

    }

    function update_faq(Request $request)
    {
        $faqs_id = $request->id;
        if($faqs_id)
        {
            if($faqs = faqs::find($faqs_id)){
                $faqs->faq_category_id      = $request->faq_category_id?$request->faq_category_id:$faqs->title;
                $faqs->question             = $request->question?$request->question:$faqs->status;
                $faqs->answer               = $request->answer?$request->answer:$faqs->content;        
            
                if($faqs->save()){
                    return json_encode(["status"=>200,"message"=>__("faqs Saved Successfuly"),"data"=>faqs::find($faqs->id)]);
                }else{
                    return  json_encode(["status"=>201,"message"=>__("Failed to Save faqs")]);
                }
            }else{
                return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
            }
        }else{
            return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
        }
    }
    
    function delete_faq(Request $request)
    {
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            
            $faqs = faqs::find($request->id);
            if($faqs){
                if($faqs->delete()){
                    return json_encode(["status"=>200,"message"=>__("FAQs Deleted Successfuly")]);
                }else{
                    return json_encode(["status"=>202,"message"=>__("Failed to Delete FAQs")]);
                }
            }else{
                return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
    }

}
