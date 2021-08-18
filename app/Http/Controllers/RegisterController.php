<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class RegisterController extends Controller
{
   public function index()
   {
   	 return view('/register');
   }
   public function save(Request $request)
    {
    	$first_name=$request->input('up_first_name');
    	$last_name=$request->input('up_last_name');
    	$address=$request->input('up_address');
    	$email=$request->input('us_email');
    	$password=$request->input('us_password');

        $us_id=User::insertGetId([
					'us_email'=>$email,
   	 				'us_password'=>$password,
   	 			
		]);

    	$rg=UserProfile::insert([
    		        'up_user'=>$us_id,
					'up_first_name'=>$first_name,
					'up_last_name'=>$last_name,
   	 				'up_address'=>$address
		]);
		return view('/register');
	}
}