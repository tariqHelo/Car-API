<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;


class AuthController extends Controller
{
    //register new user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    //login user and create token
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'success login',
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
            'user' => $user
        ], 200);
    }


    //logout user
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    //resetPassword user
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'We can\'t find a user with that e-mail address.'
            ], 404);
        }

        $user->sendPasswordResetNotification($user->createToken('authToken')->plainTextToken);

        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ], 200);
    }

    //newPassword user
    public function newPassword(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'We can\'t find a user with that e-mail address.'
            ], 404);
        }

        if ($request->token != $user->currentAccessToken()->plainTextToken) {
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'message' => 'Your password has been reset!'
        ], 200);


    }
}
