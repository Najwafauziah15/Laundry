<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;

class MemberImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Member([ 
            'nama' => $row ['nama'],
            'alamat' => $row['alamat'],
            'jenis_kelamin' => $row['jk'],
            'tlp' => $row['telepon']
        ]);
    }

    public function headingRow():int{
        return 3;
    }
}
