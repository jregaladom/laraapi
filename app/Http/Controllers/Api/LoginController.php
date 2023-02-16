<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {

        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken($request->name)->plainTextToken;

            return response()->json([
                'token' => $token,
                'message' => 'Login successful',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
    }
}
