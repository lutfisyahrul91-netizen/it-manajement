<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MonitorExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Get all monitor data to export
        return DB::table('monitor')->get();
    }

    /**
     * Map each row to specific columns
     */
    public function map($monitor): array
    {
        return [
            $monitor->no_seri,
            $monitor->merk,
            $monitor->tahun_pengadaan,
            $monitor->pemeliharaan,
            $monitor->jumlah,
            $monitor->kondisi,
        ];
    }

    /**
     * Set column headings
     */
    public function headings(): array
    {
        return [
            'No Seri',
            'Merk',
            'Tahun Pengadaan',
            'Tanggal Pemeliharaan',
            'Jumlah',
            'Kondisi',
        ];
    }
}
