<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userApiController extends Controller
{
    public function index()
    {
        $allUser = User::all();
        return response()->json([
            'data' => $allUser
        ]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'msg' => 'success logout'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'msg' => 'invalid credentials'
            ]);
        }

        if (Auth::user()->verif == 'unverified') {
            Auth::logout();
            return response()->json([
                'msg' => 'user unverified'
            ]);
        }
        
        return response()->json([
            'data' => Auth::user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ]
        );
    }
}
