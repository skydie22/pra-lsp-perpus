<?php

namespace App\Http\Controllers\admin;

use App\Exports\AnggotaExport;
use App\Exports\PeminjamanExport;
use App\Exports\PengembalianExport;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    //excel
    public function exportPeminjamanExcel(Request $request)
    {
        // dd($request);
        return Excel::download(new PeminjamanExport($request), 'laporan-perpus.xlsx');
    }

    public function exportPengembalianExcel(Request $request)
    {
        return Excel::download(new PengembalianExport($request), 'laporan-perpus.xlsx');
    }

    public function exportAnggotaExcel(Request $request)
    {
        return Excel::download(new AnggotaExport($request), 'laporan-perpus.xlsx');
    }
}
