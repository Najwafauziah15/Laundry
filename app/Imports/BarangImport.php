<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    /**
     * untuk interface dari ToModel, 
     * yang mana digunakan sebagai inisialisasi antara judul row dengan field di table
    */
    public function model(array $row)
    {
        return new Barang([ 
            'nama_barang' => $row ['nama_barang'],
            'qty' => $row['jumlah'],
            'harga' => $row['harga'],
            'waktu_beli' => $row['waktu_beli'],
            'supplier' => $row['supplier'],
            'status' => $row['status_barang'],
            'waktu_update' => $row['waktu_update_status'],
        ]);
    }

    /**
     * untuk interface dari WithHeadingRow, 
     * yang mana digunakan sebagai return baris keberapa yang akan digunakan
    */
    public function headingRow():int{
        return 3;
    }
}
