<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class soft extends Controller
{
    function index()
    {
        return view("welcome");
    }



    function login()
    {
        if(!Auth::check()){
            return view("layout.login");
        }else{
            return redirect("/");
        }
    }

    function forgetpassword()
    {
        if(!Auth::check()){
            return view("layout.forgetpassword");
        }else{
            return redirect("/");
        }
    }

     public function login_check(Request $request){
        if (Auth::check()) {
            return redirect('/');
        }else{
          $user_details2 = [
                'email'=>$request->get("login"),
                'password'=>$request->get("pass")
            ];
                if (Auth::attempt($user_details2, true)) {
                if ($request->get("redirect")=='') {

                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
        }
            }
            return back()->with('message','Wrong Login Details.');
            
    
    }
}
