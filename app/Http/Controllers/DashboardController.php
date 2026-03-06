<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Wajib ditambahkan untuk Query Database

class DashboardController extends Controller
{
    public function adminIndex()
    {
       
        $monitors = DB::table('monitor')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Monitor' as jenis"));
        $laptops = DB::table('laptop')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Laptop' as jenis"));
        $pcs = DB::table('pc')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'PC' as jenis"));
        $eksternals = DB::table('perangkat_eksternal')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Eksternal' as jenis"));

        //  Menggabungkan (UNION) semua data menjadi satu koleksi besar
        $allAssets = $monitors->union($laptops)->union($pcs)->union($eksternals)->get();

        // Menghitung Total Angka Statistik (Berdasarkan kolom 'jumlah')
        $totalSemua = $allAssets->sum('jumlah');
        $totalBaik = $allAssets->where('kondisi', 'Baik')->sum('jumlah');
        $totalPemeliharaan = $allAssets->where('kondisi', 'Pemeliharaan')->sum('jumlah');

        // Menghitung Persentase (Mencegah error pembagian dengan 0)
        $persenBaik = $totalSemua > 0 ? round(($totalBaik / $totalSemua) * 100) : 0;
        $persenPemeliharaan = $totalSemua > 0 ? round(($totalPemeliharaan / $totalSemua) * 100) : 0;

        // Mengambil 10 data terbaru untuk tabel Recent History (Diurutkan dari pemeliharaan terbaru)
        $history = $allAssets->sortByDesc('pemeliharaan')->take(10);

        // Mengirimkan data yang sudah diolah ke View Dashboard Admin
        return view('admin.dashboard', compact(
            'totalSemua', 
            'totalBaik', 
            'totalPemeliharaan', 
            'persenBaik', 
            'persenPemeliharaan', 
            'history'
        )); 
    }

    public function itIndex()
    {
        $monitors = DB::table('monitor')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Monitor' as jenis"));
        $laptops = DB::table('laptop')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Laptop' as jenis"));
        $pcs = DB::table('pc')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'PC' as jenis"));
        $eksternals = DB::table('perangkat_eksternal')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Eksternal' as jenis"));


        $allAssets = $monitors->union($laptops)->union($pcs)->union($eksternals)->get();


        $totalSemua = $allAssets->sum('jumlah');
        $totalBaik = $allAssets->where('kondisi', 'Baik')->sum('jumlah');
        $totalPemeliharaan = $allAssets->where('kondisi', 'Pemeliharaan')->sum('jumlah');

        $persenBaik = $totalSemua > 0 ? round(($totalBaik / $totalSemua) * 100) : 0;
        $persenPemeliharaan = $totalSemua > 0 ? round(($totalPemeliharaan / $totalSemua) * 100) : 0;

        $history = $allAssets->sortByDesc('pemeliharaan')->take(10);

        return view('it.dashboard', compact(
            'totalSemua', 
            'totalBaik', 
            'totalPemeliharaan', 
            'persenBaik', 
            'persenPemeliharaan', 
            'history'
        ));
    }

    public function hrdIndex()
    {
        $monitors = DB::table('monitor')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Monitor' as jenis"));
        $laptops = DB::table('laptop')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Laptop' as jenis"));
        $pcs = DB::table('pc')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'PC' as jenis"));
        $eksternals = DB::table('perangkat_eksternal')->select('no_seri', 'merk', 'tahun_pengadaan', 'pemeliharaan', 'jumlah', 'kondisi', DB::raw("'Eksternal' as jenis"));

        $allAssets = $monitors->union($laptops)->union($pcs)->union($eksternals)->get();

        $totalSemua = $allAssets->sum('jumlah');
        $totalBaik = $allAssets->where('kondisi', 'Baik')->sum('jumlah');
        $totalPemeliharaan = $allAssets->where('kondisi', 'Pemeliharaan')->sum('jumlah');

        $persenBaik = $totalSemua > 0 ? round(($totalBaik / $totalSemua) * 100) : 0;
        $persenPemeliharaan = $totalSemua > 0 ? round(($totalPemeliharaan / $totalSemua) * 100) : 0;

        $history = $allAssets->sortByDesc('pemeliharaan')->take(10);

        return view('hrd.dashboard', compact(
            'totalSemua', 
            'totalBaik', 
            'totalPemeliharaan', 
            'persenBaik', 
            'persenPemeliharaan', 
            'history'
        ));
    }
}