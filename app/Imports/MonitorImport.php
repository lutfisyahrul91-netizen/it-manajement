<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MonitorImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Kita pastikan data tidak kosong sebelum dimasukkan
            if (!empty($row['no_seri'])) {
                DB::table('monitor')->updateOrInsert(
                    ['no_seri' => $row['no_seri']], // Kunci utama agar tidak duplikat
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
}
