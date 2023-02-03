<?php

namespace App\Exports;

use App\Models\Identitas;
use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengembalianExport implements FromView, ShouldAutoSize
{

    public $request;

    public function __construct($request)
    {
        $this->request = $request;    
    }

    public function view(): View
    {
        $data = Peminjaman::where('tanggal_pengembalian', $this->request->tanggal_pengembalian)->get();
        $identitas = Identitas::first();
        return view('admin.laporan.excel.laporan_pengembalian', compact('data', 'identitas'));
    }
    
}
