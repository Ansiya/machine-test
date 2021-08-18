<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Registration;

class LoginController extends Controller
{
    public function index()
    {
	    session_start();
	     if(isset($_SESSION['us_id']))
		  {
            return view('/user_dashboard');
		  }
		  else
		  {
		    return view('/login');
		  }
    
	    

    }
     public function login(Request $request)
    {
    	//echo "ok";die;
		$user=new User();
		$name= $request->input('us_email');
		$password= $request->input('us_password');

		$details=User::where('us_email',$name)
		              ->where('us_password',$password)
		              ->get();

	
		 
		 if (count($details) > 0) {
		  
		  session_start();

		  $_SESSION['us_id']=$details[0]->us_id;

           
		 	return redirect('/login');
		 }
		 else
		 {
		   return "invalid credentials";
		 }
    
    }

     public static function getuserdata($us_id)
    {
      $details=User::where('us_id',$us_id)->first();
      return $details;
    }

   
    public function logout()
    {

      session_start();
      if (isset($_SESSION['us_id'])) {
        unset($_SESSION['us_id']); 
        return redirect('/login');
     } 
     else {
        return false;
     }
    }


}
