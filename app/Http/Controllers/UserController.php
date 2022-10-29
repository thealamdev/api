<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // register function:
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;
        return response([
            'user'=>$user,
            'token'=>$token,
        ],201);
    }

    //logout function:
    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'Logout successfully',
        ]);
    }

    //login function:
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'The email or password are not correct',
            ],401);
        }
  
            $token = $user->createToken('mytoken')->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token,
            ],200);

       
      
    }
}
