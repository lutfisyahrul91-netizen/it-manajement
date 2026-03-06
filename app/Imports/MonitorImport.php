<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class MonitorImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            DB::table('monitor')->updateOrInsert(
                ['no_seri' => $row['no_seri']], 
                [
                    'merk' => $row['merk'],
                    'tahun_pengadaan' => $row['tahun_pengadaan'],
                    'pemeliharaan' => $row['pemeliharaan'],
                    'jumlah' => $row['jumlah'],
                    'kondisi' => $row['kondisi'],
                ]
            );
        }
    }
}