<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    /* add category */
    public function addcategory(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
            'categoryName' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $cat = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($cat['vendorId'],$cat['vendorToken']);
        if($verifiedVendorId == $cat['vendorId']){
            $checkDuplicate = Category::query()
                                    ->where('categoryName',$cat['categoryName'])
                                    ->where('vendorId',$cat['vendorId'])
                                    ->count();
            if($checkDuplicate <= 0){
                $category['categoryName'] = $cat['categoryName'];
                $category['vendorId'] = $cat['vendorId'];

                if(isset($cat["categoryImage"])){
                    $categoryImage = $cat["categoryImage"];
                    $catImage = $categoryImage->getClientOriginalName();
                    $extension  = pathinfo($categoryImage->getClientOriginalName(), PATHINFO_EXTENSION);
                    $catImage = "categoryImage".time().".".$extension;
                    $uploadPath = public_path()."/uploads/categoryimage";
                    $categoryImage->move($uploadPath, $catImage);
                    $category['categoryImage'] = $catImage;
                }
                $categoryData = Category::create($category); 

                if($categoryData->id > 0){
                    return response()->json(['status'=>1,'message'=>'Category Save Successfully']); 
                }
                else{
                    return response()->json(['status'=>0,'message'=>'Category Not Saved']); 
                }
            }
            else{
                return response()->json(['status'=>0,'message'=>'Category With Same Name Already Exist']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }
  
  
  	/* get category list */
    public function getcategorylist(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $cat = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($cat['vendorId'],$cat['vendorToken']);
        if($verifiedVendorId == $cat['vendorId']){
            $categorData = Category::query()
                                    ->where('vendorId',$cat['vendorId'])
                                    ->get();
            if(count($categorData) > 0){
                foreach($categorData as $c){
                    $category['categoryId'] = $c->id;
                    $category['categoryName'] = $c->categoryName;
                    $categoryImage = asset('public/uploads/no-photo.png');
                    if($c->categoryImage!="" && $c->categoryImage!=null) {
                        if(file_exists(public_path()."/uploads/categoryimage/".$c->categoryImage)) {
                            $categoryImage = asset('public/uploads/categoryimage/'.$c->categoryImage);
                        }
                    }
                    $category['categoryImage'] = $categoryImage;

                    $categorList[] = array('categoryId' => $category['categoryId'],
                                           'categoryName' =>  $category['categoryName'],
                                           'categoryImage' => $category['categoryImage']);
                }
                return response()->json(['status'=>1,'message'=>'Category List Found', 'response'=>$categorList]); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'Category List Not Found']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }
}
