<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class MonitorImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $mulaiBacaData = false;
        $indexKolom = []; // Menyimpan urutan kolom dinamis (0 = no_seri, 1 = merk, dst)

        foreach ($rows as $row) {
            
            // SCANNER PENCARI BARIS JUDUL TABEL (HEADER)
            if (!$mulaiBacaData) {
                // Menggabungkan semua teks di baris ini menjadi huruf kecils 
                $teksBaris = strtolower(implode(' ', $row->toArray()));
                
                // Jika baris ini punya kata "seri" dan "merk", KITA TEMUKAN HEADERNYA!
                if (str_contains($teksBaris, 'seri') && str_contains($teksBaris, 'merk')) {
                    $mulaiBacaData = true;
                    
                    // petakan index kolomnya agar tidak tertukar
                    foreach ($row as $index => $namaKolom) {
                        $namaKolom = strtolower(trim($namaKolom));
                        if (str_contains($namaKolom, 'seri')) $indexKolom['no_seri'] = $index;
                        if (str_contains($namaKolom, 'merk')) $indexKolom['merk'] = $index;
                        if (str_contains($namaKolom, 'tahun')) $indexKolom['tahun_pengadaan'] = $index;
                        if (str_contains($namaKolom, 'pemeliharaan')) $indexKolom['pemeliharaan'] = $index;
                        if (str_contains($namaKolom, 'jumlah')) $indexKolom['jumlah'] = $index;
                        if (str_contains($namaKolom, 'kondisi')) $indexKolom['kondisi'] = $index;
                    }
                }
                continue; // Lompat ke baris berikutnya di Excel
            }


            // BACA DATA & MASUKKAN KE DATABASE

            if ($mulaiBacaData) {
                // Ambil index no_seri, jika tidak ada, beri nilai null
                $idxNoSeri = $indexKolom['no_seri'] ?? null;
                
                // Pastikan baris ini punya isi di kolom No Seri (Bukan baris kosong sisa)
                if ($idxNoSeri !== null && !empty($row[$idxNoSeri])) {
                    
                    // Ambil data sesuai index kolom yang sudah dipetakan di Tahap 1
                    $noSeriValue  = $row[$idxNoSeri];
                    $merkValue    = $row[$indexKolom['merk'] ?? null] ?? '-';
                    $tahunValue   = $row[$indexKolom['tahun_pengadaan'] ?? null] ?? 0;
                    $jumlahValue  = $row[$indexKolom['jumlah'] ?? null] ?? 1;
                    $kondisiValue = $row[$indexKolom['kondisi'] ?? null] ?? 'Baik';
                    
                    // --- PENERJEMAH TANGGAL YANG KITA BUAT SEBELUMNYA ---
                    $pemeliharaanValue = null;
                    $idxPemeliharaan = $indexKolom['pemeliharaan'] ?? null;
                    
                    if ($idxPemeliharaan !== null && !empty($row[$idxPemeliharaan])) {
                        $nilaiTgl = $row[$idxPemeliharaan];
                        if (is_numeric($nilaiTgl)) {
                            $pemeliharaanValue = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($nilaiTgl)->format('Y-m-d');
                        } else {
                            $pemeliharaanValue = date('Y-m-d', strtotime($nilaiTgl));
                        }
                    }

                    // CEK DUPLIKAT DAN INSERT 
                    $cekDuplikat = DB::table('monitor')->where('no_seri', $noSeriValue)->first();

                    if (!$cekDuplikat) {
                        DB::table('monitor')->insert([
                            'no_seri'         => $noSeriValue,
                            'merk'            => $merkValue,
                            'tahun_pengadaan' => $tahunValue,
                            'pemeliharaan'    => $pemeliharaanValue,
                            'jumlah'          => $jumlahValue,
                            'kondisi'         => $kondisiValue,
                        ]);
                    }
                }
            }
        }
    }
}