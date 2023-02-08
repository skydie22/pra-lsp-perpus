<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasApiController extends Controller
{
    public function index()
    {
        $identitas = Identitas::all();

        return response()->json([
            'data' => $identitas
        ]);
    }

    public function update(Request $request)
    {
        $identitas = Identitas::update([
            'nama_app' => $request->nama_app,
            'alamat_app' => $request->alamat_app,
            'email_app' => $request->email_app,
            'nomor_hp' => $request->nomor_hp
        ]);

        return response()->json([
            'msg' => 'identitas updated'
        ]);
    }
}
