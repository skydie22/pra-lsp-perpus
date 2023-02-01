<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class peminjamanApiController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        
        return response()->json([
            'data' => $peminjaman
        ]);
    }

    public function store(Request $request)
    {
        $peminjaman = Peminjaman::all();
        $peminjaman->create($request->all());

        return response()->json([
            'msg' => 'peminjaman created',
            'data' => $peminjaman
        ]);
    }
}
