<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $requset){
        $requset->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $user=User::where('email',$requset->email)->first();
        if(!$user || !Hash::check($requset->password, $user->password)){
            return response()->json([
                'success'=>false,
                'message'=>'Unauthorized',
            ]);
        }

        $user->tokens()->delete();
        $token=$user->createToken($requset->name)->plainTextToken;
        return response()->json([
            'success'=>true,
            'message'=>'Success',
            'token'=>$token
        ]);
    }
}
