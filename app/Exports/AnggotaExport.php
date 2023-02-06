<?php

namespace App\Exports;

use App\Models\Identitas;
use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class AnggotaExport implements FromView, ShouldAutoSize, WithEvents
{
    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $data = Peminjaman::where('user_id' , $this->request->user_id)->with('buku','user')->get();
        $identitas = Identitas::first();
        return view('admin.laporan.excel.laporan_anggota', compact('data' , 'identitas'));
    }

     public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event)
            {
                $event->sheet->getDelegate()->mergeCells('A1:H1');
                $event->sheet->getDelegate()->mergeCells('A2:H2');
                $event->sheet->getDelegate()->mergeCells('A3:H3');
                $event->sheet->getDelegate()->mergeCells('A4:H4');
                $event->sheet->getDelegate()
                            ->getStyle('A1:A4')
                            ->getAlignment()
                            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            },
            AfterSheet::class => function (AfterSheet $event) {
                //ngasih padding/jarak
                $event->sheet->getDelegate()->getRowDimension('5')->setRowHeight(25);
 
                //ngasih warna belakang
                $event->sheet->getDelegate()->getStyle('A5:H5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('435EBE');
 
                //ngasih warna font putih
                $event->sheet->getDelegate()->getStyle('A5:H5')
                ->getFont()
                ->getColor()
                ->setARGB('FFFFFF');
 
                //ngasih jarak
                $event->sheet->getDelegate()
                    ->getStyle('A5:H5')
                    ->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            }
        ];
    }
}
