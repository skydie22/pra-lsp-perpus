<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class pesanApiController extends Controller
{
    public function store(Request $request)
    {
        $pesan = Pesan::Create($request->all());

        return response()->json([
            'msg' => 'pesan created',
            'data' => $pesan
        ]);
    }
}
