<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKontroller extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::get();
        $anggota = User::where('role' , 'user')->get();
        // dd($peminjaman);
        return view('admin.laporan.index', compact('anggota'));
    }

    // public function cetakPdf()
    // {
    //     $peminjaman = Peminjaman::all();
    //     $pdf = Pdf::loadview('admin.laporan.cetak_pdf', ['peminjaman' => $peminjaman]);
    //     return $pdf->download('laporan-perpus.pdf');
    // }

    public function cetakPeminjaman(Request $request)
    {
        $data = Peminjaman::where('tanggal_peminjaman' , $request->tanggal_peminjaman)->get();
        

                $pdf = Pdf::loadview('admin.laporan.laporan_peminjaman', ['data' => $data]);
                return $pdf->download('laporan-perpus.pdf');

    }


    public function cetakPengembalian(Request $request)
    {
        $data = Peminjaman::where('tanggal_pengembalian', $request->tanggal_pengembalian)->get();
        
        $pdf = Pdf::loadview('admin.laporan.laporan_pengembalian', ['data' => $data]);
        return $pdf->download('laporan-perpus.pdf');

    }

    public function cetakPeranggota(Request $request)
    {
        // $data = User::where('role' , 'user');
        $data = Peminjaman::where('user_id' , $request->user_id)->with('buku' , 'user')->get();
        $pdf = Pdf::loadview('admin.laporan.laporan_peranggota', ['data' => $data]);
        return $pdf->download('laporan-perpus.pdf');
    }
}
