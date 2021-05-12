<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuthController extends Controller
{


    // Registering User 
    public function register(Request $request){



        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);

        

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);


        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        if($user->save()){

            $data = [
                "status" => "success",
                "message" => "Register Successfull",
                "token"   => $accessToken,
            ];
        }else{
            $data = [
                "status" => "error",
                "message" => "Register Unsuccessfull",
            ];
        }





        return response()->json($data);
    }



    // login user

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
        ]);



        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            $data = [
                'status' => 'success',
                'message' => 'login successful',
                'user' => auth()->user(),
                'token' => $accessToken,
            ];

            return response()->json($data);
        }else{

            $data = [
                'status' => 'error',
                'message' => 'login Unsuccessfull',
               
            ];

            return response()->json($data);
        }

    }
}
