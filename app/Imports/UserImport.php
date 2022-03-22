<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([ 
            'name' => $row['nama'],
            'username' => $row['nama_pengguna'],
            'password' => $row['password'],
            'id_outlet' => $row['id_outlet'],
            'role' => $row['role'],
        ]);
    }

    public function headingRow():int{
        return 3;
    }
}
