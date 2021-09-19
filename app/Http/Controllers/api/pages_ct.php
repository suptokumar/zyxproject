<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\page;
use Illuminate\Http\Request;



class pages_ct extends Controller
{
    function get_pages(Request $request)
    {
        if($request->handle)
        {
            if($request->key){
                return json_encode(page::where($request->handle,$request->key)->get());
                 
            }else{
                return  json_encode(["status"=>201,"message"=>__("`key` field is Required while using `handle`")]);

            }
        }else{
            if($request->key){
                return json_encode(["status"=>200,"data"=>page::find($request->key)]);
            }else{
                return json_encode(uservendor::get());
            }
        }

    }
    
    function create_pages(Request $request){
        if(!$request->title){
        return  json_encode(["status"=>201,"message"=>__("title Not Found")]);

        }
        if(!$request->status){
        return  json_encode(["status"=>201,"message"=>__("status Not Found")]);

        }
        if(!$request->content){
        return  json_encode(["status"=>201,"message"=>__("content Not Found")]);
        }
        // if(page::where("email",$request->email)->first()){
        //      return  json_encode(["status"=>201,"message"=>__("Email already exists!")]);
        // }
        $page = new page;
        $page->title    = $request->title;
        $page->status   = $request->status;
        $page->content  = $request->content;
        if($page->save()){
            return json_encode(["status"=>200,"message"=>__("page Created Successfuly"),"data"=>page::find($page->id)]);
        }else{
            return  json_encode(["status"=>201,"message"=>__("Failed to Create page")]);
        }

    }

    
    function delete_pages(Request $request)
    {
        //dd($request->all());
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            
            $faqs = page::find($request->id);
            if($faqs){
                if($faqs->delete()){
                    return json_encode(["status"=>200,"message"=>__("page Deleted Successfuly")]);
                }else{
                    return json_encode(["status"=>202,"message"=>__("Failed to Delete page")]);
                }
            }else{
                return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
    }

    function update_pages(Request $request)
    {
        $pages_id = $request->id;
        if($pages_id)
        {
            if($pages = page::find($pages_id)){
                $pages->title       = $request->title?$request->title:$pages->title;
                $pages->status      = $request->category?$request->category:$pages->status;
                $pages->content     = $request->content?$request->content:$pages->content;        
            
                if($pages->save()){
                    return json_encode(["status"=>200,"message"=>__("pages Saved Successfuly"),"data"=>page::find($pages->id)]);
                }else{
                    return  json_encode(["status"=>201,"message"=>__("Failed to Save pages")]);
                }
            }else{
                return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
            }
        }else{
            return  json_encode(["status"=>203,"message"=>__("`id` not found")]);
        }
    }
}
