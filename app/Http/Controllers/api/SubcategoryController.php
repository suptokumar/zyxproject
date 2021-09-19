<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Validator;

class SubcategoryController extends Controller
{
    /* add sub category */
    public function addsubcategory(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
            'categoryId' => 'required',
            'subCategoryName' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $subcat = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($subcat['vendorId'],$subcat['vendorToken']);
        if($verifiedVendorId == $subcat['vendorId']){
            $checkDuplicate = Subcategory::query()
                                    ->where('subCategoryName',$subcat['subCategoryName'])
                                    ->where('categoryId',$subcat['categoryId'])
                                    ->where('vendorId',$subcat['vendorId'])
                                    ->count();
            if($checkDuplicate <= 0){
                $subCategory['subCategoryName'] = $subcat['subCategoryName'];
                $subCategory['vendorId'] = $subcat['vendorId'];
                $subCategory['categoryId'] = $subcat['categoryId'];

                if(isset($subcat["subCategoryImage"])){
                    $subCategoryImage = $subcat["subCategoryImage"];
                    $subCatImage = $subCategoryImage->getClientOriginalName();
                    $extension  = pathinfo($subCategoryImage->getClientOriginalName(), PATHINFO_EXTENSION);
                    $subCatImage = "subCategoryImage".time().".".$extension;
                    $uploadPath = public_path()."/uploads/subcategoryimage";
                    $subCategoryImage->move($uploadPath, $subCatImage);
                    $subCategory['subCategoryImage'] = $subCatImage;
                }
                $subCategoryData = Subcategory::create($subCategory); 

                if($subCategoryData->id > 0){
                    return response()->json(['status'=>1,'message'=>'Sub Category Save Successfully']); 
                }
                else{
                    return response()->json(['status'=>0,'message'=>'Sub Category Not Saved']); 
                }
            }
            else{
                return response()->json(['status'=>0,'message'=>'Sub Category With Same Name Already Exist']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }

    /* get Sub category list */
    public function getsubcategorylist(Request $request){
        $validator = Validator::make($request->all(), [
            'vendorId' => 'required', 
            'vendorToken' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $subcat = $request->all();

        $verifiedVendorId = Controller::checkVendorAuthentication($subcat['vendorId'],$subcat['vendorToken']);
        if($verifiedVendorId == $subcat['vendorId']){
            $subCategoryData = Subcategory::query()
                                    ->select('subcategories.*','categories.categoryName')
                                    ->join('categories','subcategories.categoryId','=','categories.id')
                                    ->where('subcategories.vendorId',$subcat['vendorId'])
                                    ->where('subcategories.subCategoryStatus',1)
                                    ->where('categories.categoryStatus',1)
                                    ->get();
            if(count($subCategoryData) > 0){
                foreach($subCategoryData as $sc){
                    $subCategory['subCategoryId'] = $sc->id;
                    $subCategory['subCategoryName'] = $sc->subCategoryName;
                    $subCategory['categoryId'] = $sc->categoryId;
                    $subCategory['categoryName'] = $sc->categoryName;
                    $subCategoryImage = asset('public/uploads/no-photo.png');
                    if($sc->subCategoryImage!="" && $sc->subCategoryImage!=null) {
                        if(file_exists(public_path()."/uploads/subcategoryimage/".$sc->subCategoryImage)) {
                            $subCategoryImage = asset('public/uploads/subcategoryimage/'.$sc->subCategoryImage);
                        }
                    }
                    $subCategory['subCategoryImage'] = $subCategoryImage;

                    $subCategorList[] = array('subCategoryId' => $subCategory['subCategoryId'],
                                            'subCategoryName' =>  $subCategory['subCategoryName'],
                                            'categoryId' => $subCategory['categoryId'],
                                            'categoryName' =>  $subCategory['categoryName'],
                                            'subCategoryImage' => $subCategory['subCategoryImage']);
                }
                return response()->json(['status'=>1,'message'=>'Sub Category List Found', 'response'=>$subCategorList]); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'Sub Category List Not Found']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified Vendor']);
        }
    }
}
