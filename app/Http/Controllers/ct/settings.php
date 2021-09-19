<?php

namespace App\Http\Controllers\ct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class settings extends Controller
{
    function settings()
    {
        //
    }

    function mobileui(){
        $files = [];
        $category = [];
        $categories = [];
        $path = [];
        $data = [];
        $category = scandir(public_path("/mobileui"));
        foreach($category as $folder){
        if($folder!="." && $folder != ".."){
            $file = scandir(public_path("/mobileui/".str_replace(" ","-", strtolower($folder))));
            foreach($file as  $fread){
                if($fread!=".." && $fread != "."){
                    array_push($files,$fread);
                    array_push($path, "/mobileui/".str_replace(" ","-", strtolower($folder))."/".$fread);
                    array_push($data, ["path"=>"/mobileui/".str_replace(" ","-", strtolower($folder))."/".$fread,"file"=>$fread,"category"=>$folder]);
                }
            }
            array_push($categories, $folder);
        }
        }
        return view("settings/mobileui",["data"=>$data]);
    }
    function createmobileui()
    {
        return view("settings/createmobileui");
    }
    function editmobileui(Request $request)
    {
        if($request->path){
            if(file_exists(public_path($request->path))){
                return view("settings/editmobileui",['filename'=>basename(public_path($request->path),".".pathinfo(public_path($request->path))['extension']),'category'=>str_replace(array("-","/mobileui/"), array(" ",""),dirname($request->path)),'json'=>file_get_contents(public_path($request->path)),"path"=>$request->path]);
            }else{
            return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
    function createpostui(Request $request)
    {
        if(!$request->file){
        return redirect("create/mobileui")->with("failed",__("File Name Not Valid."));
        }
        if(!$request->json){
        return redirect("create/mobileui")->with("failed",__("JSON is Not Valid."));
        }


        $files = [];
        $category = [];
        $categories = [];
        $path = [];
        $data = [];
        $category = scandir(public_path("/mobileui"));
        foreach($category as $folder){
        if($folder!="." && $folder != ".."){
            $file = scandir(public_path("/mobileui/".str_replace(" ","-", strtolower($folder))));
            foreach($file as  $fread){
                if($fread!=".." && $fread != "."){
                    array_push($files,$fread);
                    array_push($path, "/mobileui/".str_replace(" ","-", strtolower($folder))."/".$fread);
                    array_push($data, ["path"=>"/mobileui/".str_replace(" ","-", strtolower($folder))."/".$fread,"file"=>$fread,"category"=>$folder]);
                }
            }
            array_push($categories, $folder);
        }
        }


        if (!file_exists(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category))))) {
            mkdir(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category))), 0777, true);
        }
        


        if (!file_exists(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category)))."/".$request->file.".json")) {
            $filed = fopen(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category)))."/".$request->file.".json","w");
            echo fwrite($filed,$request->json);
            fclose($filed);
        }else{
            return redirect("create/mobileui")->with("failed",__("Filename already exists."));
        }
        
        





        return redirect("settings/mobileui")->with("successfully",__("Successfuly saved this file."));



    }

    function editpostui(Request $request)
    {
        if(!$request->file){
        return redirect("create/mobileui")->with("failed",__("File Name Not Valid."));
        }
        if(!$request->json){
        return redirect("create/mobileui")->with("failed",__("JSON is Not Valid."));
        }


        if (!file_exists(public_path("/mobileui".$request->prev_file))) {
            if(unlink(public_path($request->prev_file))){
            }else{
            }
        }else{
        }
        



        $files = [];
        $category = [];
        $categories = [];
        $path = [];
        $data = [];
        $category = scandir(public_path("/mobileui"));
        foreach($category as $folder){
        if($folder!="." && $folder != ".."){
            $file = scandir(public_path("/mobileui/".str_replace(" ","-", strtolower($folder))));
            foreach($file as  $fread){
                if($fread!=".." && $fread != "."){
                    array_push($files,$fread);
                    array_push($path, "/mobileui/".str_replace(" ","-", strtolower($folder))."/".$fread);
                    array_push($data, ["path"=>"/mobileui/".str_replace(" ","-", strtolower($folder))."/".$fread,"file"=>$fread,"category"=>$folder]);
                }
            }
            array_push($categories, $folder);
        }
        }


        if (!file_exists(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category))))) {
            mkdir(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category))), 0777, true);
        }
        


        if (!file_exists(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category)))."/".$request->file.".json")) {
            $filed = fopen(public_path("/mobileui/".str_replace(" ","-", strtolower($request->category)))."/".$request->file.".json","w");
            echo fwrite($filed,$request->json);
            fclose($filed);
        }else{
            return redirect("settings/mobileui")->with("failed",__("Filename already exists. Couldn't save this file"));
        }
        
        





        return redirect("settings/mobileui")->with("successfully",__("Successfuly saved this file."));
    }

    function deleteui(Request $request){
        if (!file_exists(public_path("/mobileui".$request->id))) {
            if(unlink(public_path($request->id))){
                return json_encode(['status'=>200,"message"=>__("Successfuly Deleted.")]);
            }else{
                return json_encode(['status'=>202,"message"=>__("Failed to Delete.")]);
            }
        }else{
            return json_encode(['status'=>201,"message"=>__("No File Found.")]);
        }
        
    }
}
