<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\style\NumberFormat;

class BarangExport implements FromCollection, WithHeadings, WithEvents,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    /**
     * untuk interface dari FromCollection, 
     * yang mana digunakan sebagai return model yang dipanggil
    */
    public function collection()
    {
        return Barang::all();
    }

    /**
     * untuk interface dari WithMaping, 
     * yang mana digunakan sebagai mapping field di excel
    */
    public function map($barang): array
    {
        return[
            $barang->nama_barang,
            $barang->qty,
            $barang->harga,
            $barang->waktu_beli,
            $barang->supplier,
            $barang->status,
            $barang->waktu_update
        ];
    }

    /**
     * untuk interface dari WithHeadings, 
     * yang mana digunakan sebagai return isi tiap judul baris di excel
    */
    public function headings(): array
    {
        return[
            'Nama Barang',
            'Jumlah',
            'Harga',
            'Waktu Beli',
            'Supplier',
            'Status Barang',
            'Waktu Update Status'
        ];
    }

    /**
     * untuk interface dari WithEvents, 
     * yang mana digunakan untuk merapihkan dan mengubah kolom atau baris di excel
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true); //no
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->setCellValue('A1', 'DATA BARANG');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                // $event->sheet->getStyle('A1');
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:G' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:G3',
                    [
                        //Set border style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000']
                            ],
                        ],
                    ],
                );
            }
        ];
    }
}
