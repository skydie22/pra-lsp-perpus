<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileApiController extends Controller
{
    public function index()
    {
        $profil = User::where('id', Auth::user()->id)->get();

        return response()->json([
            'data' => $profil
        ]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id)->update($request->all());

        return response()->json([
            'msg' => 'data updated',
            'data' => $user
        ]);

    }
}
