<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function check(Request $request)
    {
 
     $credentials = $request->validate([
     'email' => ['required', 'email'],
     'password' => ['required'],
        ]);

        // $user = User::where('email', $request->email)->first();
        
        if (Auth::attempt($credentials))
        {
           $user = Auth::User();
           return response()->json([ 'status' => true ,
                                    'token' => $user->createToken("API TOKEN")->plainTextToken,
                                     'message' => "Success",
                                     'user' => "$user"
        ]);
        }
            return response()->json(['status' => false ,
                                     'message' => "Fail"
        
        ]);
       }

       public function user(){
         return Auth::User();
       }

}
