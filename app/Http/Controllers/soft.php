<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\uservendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Hash;

class soft extends Controller
{
    function index()
    {
        return view("welcome");
    }



    function login()
    {
        if(!Auth::guard('admin')->check()){
            return view("layout.login");
        }else{
            return redirect("/");
        }
    }
    function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect("/login");

        }else{
            return redirect("/login");
        }
    }
    function signup()
    {
       if(Auth::guard('admin')->check()){
         return redirect("/login");
     }
        return view("layout.signup");
    }

    function forgetpassword()
    {
        if(!Auth::guard('admin')->check()){
            return view("layout.forgetpassword");
        }else{
            return redirect("/");
        }
    }

     public function login_check(Request $request){
        if (Auth::guard('admin')->check()) {
            return redirect('/');
        }else{


          $user_details2 = [
                'email'=>$request->get("email"),
                'password'=>$request->get("password")
            ];
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true)) {
                 
                if ($request->get("redirect")=='') {

                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
            }
            }
            return back()->with('message','Wrong Login Details.');
    }


     public function register(Request $request)
     {
        if (Auth::guard('admin')->check()) {
            return redirect('/');
        }else
            {
                $validatedData = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6|confirmed',
                ]);

                // $getemail =  User::get('email');
                // if ($getemail == $request->email) {
                //     return redirect('/signup')->with('email_exist','This email already Exist');
                // }
                User::insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => "Admin",
            'permissions' => '',
                    'created_at' => Carbon::now(),
                ]);

                $user = new user;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                
                return redirect('/')->with('successfully','Successfully Registation ');
            }
            
    
     }


     public function viewallvendor(){
         $uservendor = new uservendor;
         $allverdor = $uservendor->all();
         return view('layout.viewallvendor', [
             'allverdors' => $allverdor,
         ]);
     }
     public function createvendorshow(){
        return view('layout.createvendor');
     }
     public function ceratevendor(Request $request){
        uservendor::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'created_at' => Carbon::now(),
        ]);
        return redirect('/view/allvendor')->with('successfully','Vendor Successfully Created ');
     }
     public function editvendor($id){
        $uservendor = new uservendor;
        $editvendor = $uservendor->find($id);
        return view('layout.editvendor',[
            'editvendor' => $editvendor,
        ]);
     }
     public function updatevendor(Request $request){
        
        if($request->vendor_id)
        {
        if($vendor = uservendor::find($request->vendor_id)){
        $vendor->name = $request->name?$request->name:$vendor->name;
        $vendor->email = $request->email?$request->email:$vendor->email;
        if($request->email && uservendor::where([["email",$request->email],["id","!=",$request->vendor_id]])->first())
        {
        return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','Email already exists');

        }
        $vendor->password = $request->password?$request->password:$vendor->password;
        $vendor->otp_verified = $request->otp_verified?$request->otp_verified:$vendor->otp_verified;
        $vendor->store_name = $request->store_name?$request->store_name:$vendor->store_name;
        $vendor->store_category = $request->store_category?$request->store_category:$vendor->store_category;
        $vendor->store_category_id = $request->store_category_id?$request->store_category_id:$vendor->store_category_id;
        $vendor->country_code = $request->country_code?$request->country_code:$vendor->country_code;
        $vendor->whatsapp = $request->whatsapp?$request->whatsapp:$vendor->whatsapp;
        $vendor->phone = $request->phone?$request->phone:$vendor->phone;
        $vendor->address = $request->address?$request->address:$vendor->address;
        $vendor->url = $request->url?$request->url:$vendor->url;
        $vendor->map_lattitude = $request->map_lattitude?$request->map_lattitude:$vendor->map_lattitude;
        $vendor->map_longitude = $request->map_longitude?$request->map_longitude:$vendor->map_longitude;
        $vendor->shop_in_app = $request->shop_in_app?$request->shop_in_app:$vendor->shop_in_app;

        if ($request->hasFile('logo'))
        {
                $r = $request->file('logo')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('logo')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
                if($vendor->logo)
                {
                    if(file_exists(public_path() . "/../".$vendor->logo)){
                    unlink(public_path() . "/../".$vendor->logo);
                    }  

                }
            $vendor->logo = "/public/asset/".$file;
        }
        if ($request->hasFile('featured_image'))
        {
                $r = $request->file('featured_image')
                    ->getPathName();
                // Save the image
                $path = public_path() . "/asset/";
                $file = time() . rand() . $request->file('featured_image')
                    ->getClientOriginalName();
                move_uploaded_file($r, $path . $file);
                if($vendor->featured_image)
                {
                    if(file_exists(public_path() . "/../".$vendor->featured_image)){
                    unlink(public_path() . "/../".$vendor->featured_image);
                    }
                }
            $vendor->featured_image = "/public/asset/".$file;
        }

        if($vendor->save()){
        return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','Vendor Saved Successfuly');
        }else{
        return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','Failed to save Vendor');
        }

        }else{
        return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','ID not matched');
        }


        }else{
        return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','ID not found ');
        }
      }


     public function deletevendor($id){
   
        $uservendor = uservendor::find($id);
        $uservendor->delete();
        return response()->json([
          'message' => 'Vendor deleted successfully!'
        ]);
  
  }



}
