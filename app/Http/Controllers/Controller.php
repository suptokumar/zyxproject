<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Vendor;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
    public function getUserOneValue($fieldName,$whereField,$whereValue){
          $userData = User::query()
                                 ->select($fieldName)
                                 ->where($whereField,$whereValue)
                                 ->get(); 

         if(count($userData) > 0){
             return $userData[0]->id;
         }
     }

     public function checkVendorAuthentication($vendorId,$vendorToken){
          $vendorData = Vendor::query()
                                  ->select('id')
                                  ->where('id',$vendorId)
                                  ->where('VendorToken',$vendorToken)
                                  ->get(); 

         if(count($vendorData) > 0){
             return $vendorData[0]->id;
         }
     }

     public function checkUserAuthentication($userId,$userToken){
          $userData = User::query()
                                  ->select('id')
                                  ->where('id',$userId)
                                  ->where('userToken',$userToken)
                                  ->get(); 

         if(count($userData) > 0){
             return $userData[0]->id;
         }
     }
}
