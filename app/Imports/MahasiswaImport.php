<?php

namespace App\Imports;

use App\Model\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama' => $row[1],
            'nim' => $row[2], 
            'alamat' => $row[3], 
        ]);
    }
}
