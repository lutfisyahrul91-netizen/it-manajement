<?php

namespace App\Exports;

use App\Exports\MonitorExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MonitorExport implements FromCollection, WithHeadings
{
    /**
    * Mengambil data dari database
    */
    public function collection()
    {
        // Kita pilih spesifik kolomnya agar rapi di Excel
        return DB::table('monitor')
            ->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi')
            ->get();
    }

    /**
    * Memberikan judul pada baris paling atas di Excel
    */
    public function headings(): array
    {
        return ["No. Seri", "Merk", "Tahun Pengadaan", "Pemeliharaan", "Jumlah", "Kondisi"];
    }
}