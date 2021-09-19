<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    /* user signup api */
    public function usersignup(Request $request){
        $validator = Validator::make($request->all(), [
            'userName' => 'required', 
            'userCountryCode' => 'required', 
            'userContactNumber' => 'required',
            'password' => 'required',
            'isAcceptTerms' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $reg = $request->all();
        $reg['password'] = bcrypt($reg['password']);
        $reg['userToken'] = md5(rand(1,999999)); 
        $reg['userOtp'] = rand(1111,9999); 

        $checkDuplicate = User::query()
                                ->where('userContactNumber',$reg['userContactNumber'])
                                ->count();
        if($checkDuplicate <= 0){
            $userData = User::create($reg); 

            $success['userId'] =  $userData->id;
            $success['userName'] =  $userData->userName;
            $success['userCountryCode'] =  $userData->userCountryCode;
            $success['userContactNumber'] =  $userData->userContactNumber;
            $success['userOtp'] =  $userData->userOtp;
            $success['userToken'] =  $userData->userToken;

            if($userData->id > 0){
                return response()->json(['status'=>1,'message'=>'User Registered Successfully','response'=>$success]); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'User Not Registered Successfully']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'User Already Exists With This Info']); 
        }
    }

    /* user otp verification api */
    public function userotpverification(Request $request){
        $validator = Validator::make($request->all(), [
            'userId' => 'required', 
            'userToken' => 'required', 
            'userOtp' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $otp = $request->all();

        $verifiedUserId = Controller::checkUserAuthentication($otp['userId'],$otp['userToken']);
        if($verifiedUserId == $otp['userId']){
            $verifyOtp = User::query()
                                    ->where('userOtp',$otp['userOtp'])
                                    ->where('id',$otp['userId'])
                                    ->count();

            if($verifyOtp > 0){
                $verify['isOtpVerify'] = 1;
                $userData = User::where('id', '=', $otp['userId'])->update($verify);    

                if($userData){
                    return response()->json(['status'=>1,'message'=>'User Verification Successfully']); 
                }
                else{
                    return response()->json(['status'=>0,'message'=>'User Verification Code Is Not Match']); 
                }
            }
            else{
                return response()->json(['status'=>0,'message'=>'User Verification Code Is Mismatch']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified User']);
        }
    }
  
  	/* user signin api */
    public function usersignin(Request $request){
        $validator = Validator::make($request->all(), [
            'userCountryCode' => 'required', 
            'userContactNumber' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $login = $request->all();

        if (Auth::guard('web')->attempt(['userContactNumber' => $login['userContactNumber'], 'password' => $login['password']], false)) {
            $userData = User::query()
                                ->where('id',Auth::user()->id)
                                ->get();
          
            if(count($userData) > 0){
                $updateToken['userToken'] = md5(rand(1,999999)); 
                User::where('id', '=', Auth::user()->id)->update($updateToken);  

                $success['userId'] =  $userData[0]->id;
                $success['userName'] =  $userData[0]->userName;
                $success['userCountryCode'] =  $userData[0]->userCountryCode;
                $success['userContactNumber'] =  $userData[0]->userContactNumber;
                $success['userToken'] =  $updateToken['userToken'];

                if(Auth::user()->id > 0){
                    return response()->json(['status'=>1,'message'=>'User Loggedin Successfully','response'=>$success]); 
                }
                
            }
            else{
                return response()->json(['status'=>0,'message'=>'User Not Loggedin Successfully']); 
            }
        }
      else{
            return response()->json(['status'=>0,'message'=>'Contact Number or Password is wrong']); 
        }
    }
  
  	/* user profile api */
    public function getuserprofile(Request $request){
        $validator = Validator::make($request->all(), [
            'userId' => 'required', 
            'userToken' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $profile = $request->all();
        
      	$verifiedUserId = Controller::checkUserAuthentication($profile['userId'],$profile['userToken']);
        if($verifiedUserId == $profile['userId']){
          $userData = User::query()
                              ->where('id',$profile['userId'])
                              ->get();

          if(count($userData) > 0){
              $userProfileData['userId'] =  $userData[0]->id;
              $userProfileData['userName'] =  $userData[0]->userName;
              $userProfileData['userCountryCode'] =  $userData[0]->userCountryCode;
              $userProfileData['userContactNumber'] =  $userData[0]->userContactNumber;
              $userProfileData['userEmail'] =  $userData[0]->userEmail;
              $userProfileData['isOtpVerify'] =  $userData[0]->isOtpVerify;
              $userProfileData['userPhoto'] =  $userData[0]->userPhoto;
              $userProfileData['userAddress'] =  $userData[0]->userAddress;
              $userProfileData['userStatus'] =  $userData[0]->userStatus;

              if($userProfileData['userId'] > 0){
                  return response()->json(['status'=>1,'message'=>'User Profile Found','response'=>$userProfileData]); 
              }

          }
          else{
              return response()->json(['status'=>0,'message'=>'User Not Found']); 
          }
		}
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified User']);
        }
    }
  
  /* edit profile api */
    public function edituserprofile(Request $request){
        $validator = Validator::make($request->all(), [
            'userId' => 'required', 
            'userToken' => 'required',
            'userName' => 'required',
            'userContactNumber' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $profile = $request->all();
        
        $verifiedUserId = Controller::checkUserAuthentication($profile['userId'],$profile['userToken']);
        if($verifiedUserId == $profile['userId']){
            $edit['userName'] = $profile['userName'];
            $edit['userContactNumber'] = $profile['userContactNumber'];
            $edit['userEmail'] = $profile['userEmail'];

            if(isset($profile["password"])){
                $edit['password'] = bcrypt($reg['password']);
            }

            if(isset($profile["userPhoto"])){
                $userPhoto = $profile["userPhoto"];
                $photo = $userPhoto->getClientOriginalName();
                $extension  = pathinfo($userPhoto->getClientOriginalName(), PATHINFO_EXTENSION);
                $photo = "userPhoto".time().".".$extension;
                $uploadPath = public_path()."/uploads/userphoto";
                $userPhoto->move($uploadPath, $photo);
                $edit['userPhoto'] = $photo;
            }
            
            $updateUserProfile = User::where('id', '=', $profile['userId'])->update($edit);

            if($updateUserProfile > 0){
                /*$userProfileData['userId'] =  $userData[0]->id;
                $userProfileData['userName'] =  $userData[0]->userName;
                $userProfileData['userCountryCode'] =  $userData[0]->userCountryCode;
                $userProfileData['userContactNumber'] =  $userData[0]->userContactNumber;
                $userProfileData['userEmail'] =  $userData[0]->userEmail;
                $userProfileData['isOtpVerify'] =  $userData[0]->isOtpVerify;
                $userProfileData['userPhoto'] =  $userData[0]->userPhoto;
                $userProfileData['userAddress'] =  $userData[0]->userAddress;
                $userProfileData['userStatus'] =  $userData[0]->userStatus;*/

                return response()->json(['status'=>1,'message'=>'Profile Updated']); 
            }
            else{
                return response()->json(['status'=>0,'message'=>'Profile Not Updated']); 
            }
        }
        else{
            return response()->json(['status'=>0,'message'=>'You Are Not Verified User']);
        }
    }
}
