<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mobile_ct extends Controller
{
    function mobileui(){
        $files = [];
        $category = [];
        $categories = [];
        $path = [];
        $data = [];
        $category = scandir(public_path("\mobileui"));
        foreach($category as $folder){
        if($folder!="." && $folder != ".."){
            $file = scandir(public_path("\mobileui/".str_replace(" ","-", strtolower($folder))));
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
        return json_encode(['files'=>$files,'category'=>$categories,'path'=>$path,'data'=>$data]);
        return view("settings/mobileui");
    }
}
