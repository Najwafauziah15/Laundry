<?php

namespace App\Imports;

use App\Models\Penjemputan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenjemputanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penjemputan([ 
            'id_member' => $row['id_member'],
            'petugas' => $row['petugas_penjemputan'],
            'status' => $row['status']
        ]);
    }

    public function headingRow():int{
        return 3;
    }
}
