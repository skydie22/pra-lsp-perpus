<?php

namespace App\Exports;

use App\Models\Identitas;
use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PeminjamanExport implements FromView, ShouldAutoSize
{
    public $request;

    public function __construct($request)
    {   
        $this->request = $request;    }

    public function view(): View
    {
        $data = Peminjaman::where('tanggal_peminjaman',$this->request->tanggal_peminjaman)->get();
        $identitas = Identitas::first();

        return view('admin.laporan.excel.laporan_peminjaman',compact('data', 'identitas'));
    }
}
