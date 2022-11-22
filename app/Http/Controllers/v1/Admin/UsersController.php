<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;

class UsersController extends Controller
{

    public function index(Request $request)
    {   
        //get all users with relation to cars
        //get all users with relation to cars and paginate
        $users = User::with('cars')->paginate(10);
       // dd($users);
        return response()->json($users);
        // $users = $users->map(function ($user) {
        //     return [
        //         'id' => $user->id,
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'type' => $user->type,
        //         'cars' => $user->cars
        //     ];
        // });
        return response()->json([
            'message' => 'success',
            'data' => $users
        ], 200);
    }


    //add new user inspecter or dealer
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'type' => 'required|string'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            return response()->json([
                'message' => 'success',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }
    }



    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'success',
            ], 200);
        } else {
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }
    }


}
