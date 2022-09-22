<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
  public function login(Request $request){
    $user = User::where('email',$request->email)->first();

    if(!$user || !\Hash::check($request->password,$user->password)){
      // throw ValidationException::withMessages([
      //      'email' => ['The provided credentials are incorrect.'],
      // ],401);
      return response()->json([
        'success'=>false,
        'message'=> 'The provided credentials are incorrect.',
      ],401);
    }

      $token = $user->createToken('personal-token')->plainTextToken;

      return response()->json([
        'success'=>true,
        'message'=> 'Berhasil Login',
        'user'=>$user,
        'token'=>$token,
      ],200);


    }

    public function logout(Request $request){
      $request->user()->currentAccessToken()->delete();

      return response()->json([
        'success'=>true,
        'message'=> 'Berhasil Logout'

      ],200);

    }




}
