<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    // ==========================================
    // ROLE: IT SUPPORT
    // ==========================================
    public function index()
    {
        $services = DB::table('service')
            ->leftJoin('user', 'service.username', '=', 'user.username')
            ->leftJoin('divisi', 'service.kode_divisi', '=', 'divisi.kode')
            ->select('service.*', 'user.nama_user', 'divisi.nama_divisi')
            ->get();

        return view('it.services.index', compact('services'));
    }

    public function show($id)
    {
        // Mengakali tanda '#' yang mungkin hilang di URL
        $kode_asli = '#' . str_replace('#', '', $id);

        // Ambil data Service + Nama Peminjam
        $service = DB::table('service')
            ->leftJoin('user', 'service.username', '=', 'user.username')
            ->select('service.*', 'user.nama_user')
            ->where('kode_pinjam', $kode_asli)
            ->orWhere('kode_pinjam', $id) //  jika format asli tanpa #
            ->first();

        if (!$service) {
            abort(404, 'Data Service tidak ditemukan');
        }

        // Cari detail barang di ke-4 tabel aset
        $asset = DB::table('laptop')->where('no_seri', $service->no_seri_barang)->first()
              ?? DB::table('pc')->where('no_seri', $service->no_seri_barang)->first()
              ?? DB::table('monitor')->where('no_seri', $service->no_seri_barang)->first()
              ?? DB::table('perangkat_eksternal')->where('no_seri', $service->no_seri_barang)->first();

        // Kirim $service dan $asset ke halaman detail
        return view('it.services.show', compact('service', 'asset'));
    }

    public function indexAdmin()
    {
        $services = DB::table('service')
            ->leftJoin('user', 'service.username', '=', 'user.username')
            ->leftJoin('divisi', 'service.kode_divisi', '=', 'divisi.kode')
            ->select('service.*', 'user.nama_user', 'divisi.nama_divisi')
            ->get();

        return view('admin.services.index', compact('services'));
    }


}