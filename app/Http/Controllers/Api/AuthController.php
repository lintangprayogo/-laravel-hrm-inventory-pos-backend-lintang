<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        //if credentials are correct
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => "the username or password you entered is incorrect "], 404);
        }
        $token = $user->createToken('hrm-token')->plainTextToken;
        return response(['user' => $user, "token" => $token],200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response(['message' => "logout success"], 200);
    }


}
