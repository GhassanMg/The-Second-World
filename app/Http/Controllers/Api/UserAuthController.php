<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $validated= $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        if($validated){
            $user = User::create($validated);
        }else{
            return ApiResponseClass::errorMsgResponse( 'There is error in registration');
        }

        $token = $user->createToken('token')->accessToken;
        Auth::login($user);

        return ApiResponseClass::successResponse($token);
    }

    /**
     * Login Req
     * /** @var \App\Models\User $user **/

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        //dd($credentials);
        if(!Auth::attempt($credentials)){
            //dd($credentials);
            return ApiResponseClass::errorMsgResponse(trans('messages.wrong_credentials'));
        }else{
            //dd($credentials);
            $user = User::where(["email" => $credentials['email']])->first();
            Auth::login($user);
            $user = $request->user();
            $user['token'] = $user->createToken('token')->accessToken;
            return ApiResponseClass::successResponse($user);
        }
    }

    public function userInfo()
    {
     $user = Auth::user();

     return response()->json(['user' => $user], 200);
    }
}
