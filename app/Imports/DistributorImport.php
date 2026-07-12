<?php

namespace App\Imports;

use App\Models\Distributor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DistributorImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Distributor([
            'nama_distributor' => $row['nama_distributor'],
            'kota' => $row['kota'],
            'provinsi' => $row['provinsi'],
            'kontak' => $row['kontak'],
            'email' => $row['email'],
        ]);
    }
}
