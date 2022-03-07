<?php

namespace App\Exports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
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

class PaketExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    use Importable, RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Paket::all();
    }

    public function map($paket): array
    {
        return[
            $paket->id,
            $paket->outlet->nama,
            $paket->jenis,
            $paket->nama_paket,
            $paket->harga
        ];
    }

    public function headings(): array
    {
        return[
            'Id',
            'Id Outlet',
            'Jenis Paket',
            'Nama Paket',
            'Harga Paket'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true); //no
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:E1');
                $event->sheet->setCellValue('A1', 'DATA PAKET');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                // $event->sheet->getStyle('A1');
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:E' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:E3',
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
