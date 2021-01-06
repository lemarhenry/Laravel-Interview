<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class PassportAuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('Laravel8PassportAuth')->accessToken;

        return response()->json(['token' => $token], 200);
    }
     /**
     * Login Req
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (empty($user) or !Hash::check($request->password, $user->password)) {
            $response = ["message" => 'Invalid credentials.'];
            return response($response, 401);
        }
        $token = $user->createToken(Str::random(60))->accessToken;
        return response(['token'=> $token,'user'=>$user]);
    }

    public function userInfo()
    {

     $user = auth()->user();

     return response()->json(['user' => $user], 200);

    }
}

