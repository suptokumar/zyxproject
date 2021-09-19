<?php

namespace App\Http\Controllers\ct;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\bannerCategories;
use App\Models\bannerlocation;
use Illuminate\Support\Facades\DB;


class banners extends Controller
{
    function index()
    {
        $allbanners = DB::table('banners')
            ->join('bannercategories', 'bannercategories.id', '=', 'banners.category_id')
            ->join('bannerlocation', 'bannerlocation.id', '=', 'banners.location_id')
            ->select('banners.*', 'bannercategories.name as b_c_name', 'bannerlocation.name as b_l_name')
            ->get();
       
         return view('banners/index', [
             'allbanners' => $allbanners,
         ]);
    }
    
    function create()
    {
        $bannerCategories = new bannerCategories;
        $bannerCategories = $bannerCategories->all();
        
        $bannerlocation = new bannerlocation;
        $bannerlocation = $bannerlocation->all();
        return view('banners/create', [
            'bannerCategories' => $bannerCategories, 'bannerLocation' => $bannerlocation,
        ]);
        
    }
    function store(Request $request)
    {
       
        if(!$request->bannerName){
        return redirect("create/banners")->with("failed",__("Banner Name feild can't be blank."));
        }
        if(!$request->category){
        return redirect("create/banners")->with("failed",__("Banner category feild can't be blank."));
        }
        if(!$request->location){
            return redirect("create/banners")->with("failed",__("Banner location feild can't be blank."));
        }
        //dd($request->all());
        $banners = new banner;
        $banners->name          = $request->bannerName;
        $banners->image         = $request->bannerImg;
        $banners->category_id   = $request->category;
        $banners->location_id   = $request->location;
        $banners->status        = '1';
        if($banners->save()){
            return redirect("view/banners")->with("success",__("banners Created Successfuly."));           
        }else{
            return redirect("create/banners")->with("failed",__("Failed to Create banners."));   
        }
        
    }
    public function edit($id){

        
        $banners = new banner;
        $editbanners = $banners->find($id);
        return view('banners/edit',[
            'editbanners' => $editbanners, 'faqCategory' => $faqCategory,
        ]);
     }
    public function update(Request $request){
        $banners_id = $request->banners_id;
        if($banners_id)
        {
            if($banners = banner::find($banners_id)){
                $banners->faq_category_id  = $request->category_id?$request->category_id:$banners->category_id;
                $banners->question         = $request->question?$request->question:$banners->question;
                $banners->answer           = $request->answer?$request->answer:$banners->answer;        
            
                if($banners->save()){
                    return redirect('/banners'.$request->vendor_id)->with('successfully','banners Update Successfuly');
                }else{
                    return redirect('/banners'.$request->vendor_id)->with('successfully','Failed to update banners');
                }
            }else{
                return redirect('/banners'.$request->vendor_id)->with('successfully','ID not matched');
            }
        }else{
            return redirect('/banners'.$request->vendor_id)->with('successfully','ID not found ');
        }
    }

    function delete(Request $request){
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            $banners = banner::find($request->id);
            if($banners){
            if($banners->delete()){
                return json_encode(["status"=>200,"message"=>__("banners Deleted Successfuly")]);
            }else{
                return json_encode(["status"=>202,"message"=>__("Failed to Delete banners")]);
            }
            }else{
            return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
        
    }
    function category()
    {
        $bannerCategories = new bannerCategories;
         $allbannerCategories = $bannerCategories->all();
         return view('banners/category', [
             'allbannerCategories' => $allbannerCategories,
         ]);
    }
    function categoryCreate()
    {
       
        return view('banners/create-category');
        
    }
    function categoryStore(Request $request)
    {
        
        if(!$request->categoryName){
        return redirect("banners/create-category")->with("failed",__("Category Name feild can't be blank."));
        }
        $bannerCategories = new bannerCategories;
        $bannerCategories->name  = $request->categoryName;
        $bannerCategories->status  = '1';
        $bannerCategories->created_by = Auth::user()->id;
        if($bannerCategories->save()){
            return redirect("category/banners")->with("success",__("Banner Categories Created Successfuly."));           
        }else{
            return redirect("category/banners")->with("failed",__("Failed to Create Banner Categories."));   
        }
        
    }
    public function categoryEdit($id){

        
        $banners = new banner;
        $editbanners = $banners->find($id);
        return view('banners/edit',[
            'editbanners' => $editbanners, 'faqCategory' => $faqCategory,
        ]);
     }
    public function categoryUpdate(Request $request){
        $banners_id = $request->banners_id;
        if($banners_id)
        {
            if($banners = banner::find($banners_id)){
                $banners->faq_category_id  = $request->category_id?$request->category_id:$banners->category_id;
                $banners->question         = $request->question?$request->question:$banners->question;
                $banners->answer           = $request->answer?$request->answer:$banners->answer;        
            
                if($banners->save()){
                    return redirect('/banners'.$request->vendor_id)->with('successfully','banners Update Successfuly');
                }else{
                    return redirect('/banners'.$request->vendor_id)->with('successfully','Failed to update banners');
                }
            }else{
                return redirect('/banners'.$request->vendor_id)->with('successfully','ID not matched');
            }
        }else{
            return redirect('/banners'.$request->vendor_id)->with('successfully','ID not found ');
        }
    }

    function categoryDelete(Request $request){
        if(!$request->id)
        {
            return  json_encode(["status"=>201,"message"=>__("`id` field is Required")]);
        }else{
            $banners = banner::find($request->id);
            if($banners){
            if($banners->delete()){
                return json_encode(["status"=>200,"message"=>__("banners Deleted Successfuly")]);
            }else{
                return json_encode(["status"=>202,"message"=>__("Failed to Delete banners")]);
            }
            }else{
            return  json_encode(["status"=>201,"message"=>__("The requested id not matched.")]);
            }
        }
        
    }
    function location()
    {
        $bannerlocation = new bannerlocation;
         $allbannerlocations = $bannerlocation->all();
         return view('banners/location', [
             'allbannerlocations' => $allbannerlocations,
         ]);
    }
    
    function createLocation()
    {
        return view('banners/create-location');
        
    }
    function storeLocation(Request $request)
    {
        if(!$request->locationsName){
        return redirect("banners/create-locations")->with("failed",__("Locations Name feild can't be blank."));
        }
                
        $bannerlocation               = new bannerlocation;
        $bannerlocation->name         = $request->locationsName;
        $bannerlocation->status       = '1';
        $bannerlocation->created_by   = Auth::user()->id;
        if($bannerlocation->save()){
            return redirect("location/banners")->with("success",__("location Created Successfuly."));           
        }else{
            return redirect("banners/create-locations")->with("failed",__("Failed to Create location."));   
        }
        
    }
    public function editLocation($id){

        
        $banners = new banner;
        $editbanners = $banners->find($id);
        return view('banners/edit',[
            'editbanners' => $editbanners, 'faqCategory' => $faqCategory,
        ]);
     }
    public function updateLocation(Request $request){
        $banners_id = $request->banners_id;
        if($banners_id)
        {
            if($banners = banner::find($banners_id)){
                $banners->faq_category_id  = $request->category_id?$request->category_id:$banners->category_id;
                $banners->question         = $request->question?$request->question:$banners->question;
                $banners->answer           = $request->answer?$request->answer:$banners->answer;        
            
                if($banners->save()){
                    return redirect('/banners'.$request->vendor_id)->with('successfully','banners Update Successfuly');
                }else{
                    return redirect('/banners'.$request->vendor_id)->with('successfully','Failed to update banners');
                }
            }else{
                return redirect('/banners'.$request->vendor_id)->with('successfully','ID not matched');
            }
        }else{
            return redirect('/banners'.$request->vendor_id)->with('successfully','ID not found ');
        }
    }

}
