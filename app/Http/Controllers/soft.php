<?php

namespace App\Http\Controllers;

use App\Http\Controllers\settings\vendor_ct;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Vendorcategory;
use App\Models\vendorpayout;
use App\Models\Vendortype;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\uservendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;
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
        $allverdor = vendor::get();
        foreach($allverdor as $key => $value){
            $allverdor[$key]->vendorCategory = vendorcategory::find($value->vendorCategory)?vendorcategory::find($value->vendorCategory)->categoryName:"Not Found";
            $allverdor[$key]->status = "Opened";
            $allverdor[$key]->badge = "success";
            if($value->vendorStatus==0){
                $allverdor[$key]->status = "Closed";
                $allverdor[$key]->badge = "primary";

            }
            if($value->vendorStatus==2){
                $allverdor[$key]->status = "Deleted";
                $allverdor[$key]->badge = "danger";

            }
        }
        return view('layout.viewallvendor', [
            'allverdors' => $allverdor,
        ]);
    }
    public function vendorapprovals(){
        $allverdor = vendor::where("vendorStatus",'0')->get();
        foreach($allverdor as $key => $value){
            $allverdor[$key]->vendorCategory = vendorcategory::find($value->vendorCategory)?vendorcategory::find($value->vendorCategory)->categoryName:"Not Found";
            $allverdor[$key]->status = "Opened";
            $allverdor[$key]->badge = "success";
        }
        return view('vendor.vendorapproval', [
            'allverdors' => $allverdor,
        ]);
    }
    public function vendorapprovalall(){
        $allverdor = vendor::get();
        foreach($allverdor as $key => $value){
            $allverdor[$key]->vendorCategory = vendorcategory::find($value->vendorCategory)?vendorcategory::find($value->vendorCategory)->categoryName:"Not Found";
            $allverdor[$key]->status = "Opened";
            $allverdor[$key]->badge = "success";
        }
        return view('vendor.vendorapproval', [
            'allverdors' => $allverdor,
        ]);
    }
    public function productAppproval(){
        $allverdor = product::get();
        foreach($allverdor as $key => $value){
            $allverdor[$key]->vendorName = vendor::find($value->vendorId)?vendor::find($value->vendorId)->vendorName:"Not Found";
            $allverdor[$key]->status = "Active";
            $allverdor[$key]->badge = "success";
            if($value->productStatus==0){
                $allverdor[$key]->status = "Inactive";
                $allverdor[$key]->badge = "secondary";
            }
            if($value->productStatus==2){
                $allverdor[$key]->status = "Pending";
                $allverdor[$key]->badge = "warning";
            }
            if($value->productStatus==3){
                $allverdor[$key]->status = "Rejected";
                $allverdor[$key]->badge = "danger";
            }
        }
        return view('vendor.productapproval', [
            'allverdors' => $allverdor,
        ]);
    }
    public function vendorpayouts(){
        $allverdor = vendorpayout::where("requestStatus",0)->get();
        foreach($allverdor as $key => $value){
            $allverdor[$key]->vendorName = vendor::find($value->vendorId)?vendor::find($value->vendorId)->vendorName:"Not Found";
            $allverdor[$key]->vendorEmail = vendor::find($value->vendorId)?vendor::find($value->vendorId)->vendorEmail:"Not Found";
            $allverdor[$key]->vendorContactNumber = vendor::find($value->vendorId)?vendor::find($value->vendorId)->vendorCountryCode." ".vendor::find($value->vendorId)->vendorContactNumber:"Not Found";
            $allverdor[$key]->vendorWallet = vendor_ct::vendorWallet($value->vendorId);
        }
        return view('vendor.payout', [
            'allverdors' => $allverdor,
        ]);
    }
    public function createvendorshow(){
        $vendorCategory = vendorcategory::get();
        $vendorTypes = vendortype::get();
        return view('layout.createvendor',[
            'vendorCategories' => $vendorCategory,
            'vendorTypes' => $vendorTypes,
        ]);
    }
    public function createVendor(Request $request){

        $vendor = new vendor;
        $vendor->vendorName = $request->vendorName?$request->vendorName:"";
        $vendor->vendorEmail = $request->vendorEmail?$request->vendorEmail:"";
        $vendor->password = $request->password?Hash::make($request->password):"";
        if($request->vendorEmail && vendor::where([["vendorEmail",$request->vendorEmail],["id","!=",$request->vendor_id]])->first())
        {
            return redirect('/edit/vendor/'.$request->vendor_id)->with('failed','Email already exists');

        }
        $vendor->vendorCategory = $request->vendorCategory?$request->vendorCategory:"";
        $vendor->vendorType = $request->vendorType?$request->vendorType:"";
        $vendor->isOtpVerify = $request->isOtpVerify?$request->isOtpVerify:"";
        $vendor->storeName = $request->storeName?$request->storeName:"";
        $vendor->gstNumber = $request->gstNumber?$request->gstNumber:"";
        $vendor->storeCounty = $request->storeCounty?$request->storeCounty:"";
        $vendor->storeCity = $request->storeCity?$request->storeCity:"";
        $vendor->storeAddress = $request->storeAddress?$request->vendorCategory:"";
        $vendor->vendorCountryCode = $request->vendorCountryCode?$request->vendorCountryCode:"";
        $vendor->vendorContactNumber = $request->vendorContactNumber?$request->vendorContactNumber:"";
        $vendor->storeLatitude = $request->storeLatitude?$request->storeLatitude:"";
        $vendor->storeLongitude = $request->storeLongitude?$request->storeLongitude:"";
        $vendor->vendorDomainUrl = $request->vendorDomainUrl?$request->vendorDomainUrl:"";
        $vendor->vendorStatus = $request->vendorStatus?$request->vendorStatus:0;


        if ($request->hasFile('storeWebLogo'))
        {
            $r = $request->file('storeWebLogo')
                ->getPathName();
            // Save the image
            $path = public_path() . "/uploads/storeweblogo/";
            $file = time() . rand() . $request->file('storeWebLogo')
                    ->getClientOriginalName();
            move_uploaded_file($r, $path . $file);

            $vendor->storeWebLogo = $file;
        }
        if ($request->hasFile('storeAppLogo'))
        {
            $r = $request->file('storeAppLogo')
                ->getPathName();
            // Save the image
            $path = public_path() . "/uploads/storeapplogo/";
            $file = time() . rand() . $request->file('storeAppLogo')
                    ->getClientOriginalName();
            move_uploaded_file($r, $path . $file);

            $vendor->storeAppLogo = $file;
        }

        if($vendor->save()){
            return redirect('/view/allvendor')->with('successfully','Vendor Successfully Created');
        }else{
            return redirect('/view/allvendor')->with('failed','Failed to create Vendor');
        }
    }
    public function editvendor($id){
        $vendorCategory = vendorcategory::get();
        $vendorTypes = vendortype::get();
        $editvendor = vendor::find($id);
        return view('layout.editvendor',[
            'editvendor' => $editvendor,
            'vendorCategories' => $vendorCategory,
            'vendorTypes' => $vendorTypes,
        ]);
    }
    public function updatevendor(Request $request){

        if($request->vendor_id)
        {
            if($vendor = vendor::find($request->vendor_id)){
                $vendor->vendorName = $request->vendorName?$request->vendorName:$vendor->vendorName;
                $vendor->vendorEmail = $request->vendorEmail?$request->vendorEmail:$vendor->vendorEmail;
                if($request->vendorEmail && vendor::where([["vendorEmail",$request->vendorEmail],["id","!=",$request->vendor_id]])->first())
                {
                    return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','Email already exists');

                }
                if ($request->password){
                    $vendor->password = $request->password?Hash::make($request->password):"";
                }
                $vendor->vendorCategory = $request->vendorCategory?:$vendor->vendorCategory;
                $vendor->vendorType = $request->vendorType?:$vendor->vendorType;
                $vendor->isOtpVerify = $request->isOtpVerify?:$vendor->isOtpVerify;
                $vendor->storeName = $request->storeName?:$vendor->storeName;
                $vendor->gstNumber = $request->gstNumber?:$vendor->gstNumber;
                $vendor->storeCounty = $request->storeCounty?:$vendor->storeCounty;
                $vendor->storeCity = $request->storeCity?:$vendor->storeCity;
                $vendor->storeAddress = $request->storeAddress?$request->vendorCategory:$vendor->storeAddress;
                $vendor->vendorCountryCode = $request->vendorCountryCode?:$vendor->vendorCountryCode;
                $vendor->vendorContactNumber = $request->vendorContactNumber?:$vendor->vendorContactNumber;
                $vendor->storeLatitude = $request->storeLatitude?:$vendor->storeLatitude;
                $vendor->storeLongitude = $request->storeLongitude?:$vendor->storeLongitude;
                $vendor->vendorDomainUrl = $request->vendorDomainUrl?:$vendor->vendorDomainUrl;
                $vendor->vendorStatus = $request->vendorStatus?:0;


                if ($request->hasFile('storeWebLogo'))
                {
                    $r = $request->file('storeWebLogo')
                        ->getPathName();
                    // Save the image
                    $path = public_path() . "/uploads/storeweblogo/";
                    $file = time() . rand() . $request->file('storeWebLogo')
                            ->getClientOriginalName();
                    move_uploaded_file($r, $path . $file);
                    if($vendor->storeWebLogo)
                    {
                        if(file_exists(public_path() . "/../".$vendor->storeWebLogo)){
                            unlink(public_path() . "/../".$vendor->storeWebLogo);
                        }

                    }
                    $vendor->storeWebLogo = $file;
                }
                if ($request->hasFile('storeAppLogo'))
                {
                    $r = $request->file('storeAppLogo')
                        ->getPathName();
                    // Save the image
                    $path = public_path() . "/uploads/storeapplogo/";
                    $file = time() . rand() . $request->file('storeAppLogo')
                            ->getClientOriginalName();
                    move_uploaded_file($r, $path . $file);
                    if($vendor->storeAppLogo)
                    {
                        if(file_exists(public_path() . "/../".$vendor->storeAppLogo)){
                            unlink(public_path() . "/../".$vendor->storeAppLogo);
                        }
                    }
                    $vendor->storeAppLogo = $file;
                }

                if($vendor->save()){
                    return redirect('/edit/vendor/'.$request->vendor_id)->with('successfully','Vendor Saved Successfully');
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

        $uservendor = vendor::find($id);
        $uservendor->delete();
        return response()->json([
            'message' => 'Vendor deleted successfully!'
        ]);

    }



}
