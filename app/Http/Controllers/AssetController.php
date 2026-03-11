<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Imports\MonitorImport; 
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetController extends Controller
{
    // ==========================================
    // 1. HALAMAN UNTUK ROLE ADMIN
    // ==========================================
    public function importMonitorExcel(Request $request)
    {
        // Validasi file
        $request->validate([
        'file_excel' => 'required|mimes:xlsx,xls'
        ]);

        // Proses Import
        Excel::import(new MonitorImport, $request->file('file_excel'));
        return back()->with('success', 'Data Monitor Berhasil Diimport!');
    }
   


    public function laptopAdmin()
    {
        // MENGAMBIL DATA DARI DATABASE MYSQL (Bukan lagi dummy array)
        $laptops = DB::table('laptop')->get();

        // 2. Mengirim data ke View (Kita ubah cara view membacanya nanti)
        return view('admin.assets.laptop', compact('laptops'));
    }


    public function monitorAdmin()
    {
        $monitors = DB::table('monitor')->get();
        return view('admin.assets.monitor', compact('monitors'));
    }


     public function pcAdmin()
    {
        $pcs = DB::table('pc')->get();

        // Mengirimkan data ke view admin.assets.pc
        return view('admin.assets.pc', compact('pcs'));
    }


   public function eksternalAdmin()
    {
        // Mengambil seluruh data dari tabel 'perangkat_eksternal' di database MySQL
        $eksternals = DB::table('perangkat_eksternal')->get();

        // Mengirimkan data ke view admin.assets.eksternal
        return view('admin.assets.eksternal', compact('eksternals'));
    }

    public function storeMonitorAdmin(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'no_seri' => 'required|unique:monitor,no_seri', // Mencegah duplikat nomor seri
            'merk' => 'required|string|max:255',
            'tahun_pengadaan' => 'required|integer',
            'pemeliharaan' => 'nullable|date', // Bisa kosong jika belum pernah diservis
            'jumlah' => 'required|integer',
            'kondisi' => 'required|in:Baik,Pemeliharaan,Rusak',
        ]);

        // Insert data ke dalam tabel database MySQL
        DB::table('monitor')->insert([
            // PERBAIKAN: Tambahkan trim() agar spasi yang tidak sengaja terketik dibuang
            'no_seri' => trim($request->no_seri), 
            'merk' => $request->merk,
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'pemeliharaan' => $request->pemeliharaan,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);

        // Kembalikan ke halaman sebelumnya
        return back()->with('success', 'Data Monitor Berhasil Ditambahkan!');
    }

    // Fungsi untuk menghapus data monitor berdasarkan no_seri
    public function destroyMonitorAdmin($id)
    {
        // Menghapus data berdasarkan no_seri (bisa membaca yang ada '#' maupun tidak)
        DB::table('monitor')
            ->where('no_seri', $id)
            ->orWhere('no_seri', '#' . $id)
            ->delete();

        // Mengembalikan halaman dengan pesan sukses
        return back()->with('success', 'Data Monitor Berhasil Dihapus!');
    }

    // fungsi show detail monitor di halaman admin
    public function showMonitorAdmin($id)
    {
        // PERBAIKAN: Kita buat pencarian ganda.
        // Cari data yang no_seri-nya SAMA PERSIS dengan $id (untuk data baru), 
        // ATAU cari yang ada tambahan '#' di depannya (untuk data lama).
        $monitor = DB::table('monitor')
                    ->where('no_seri', $id)
                    ->orWhere('no_seri', '#' . $id)
                    ->first();

        if (!$monitor) {
            abort(404, 'Data Monitor tidak ditemukan');
        }

        return view('admin.assets.monitor_show', compact('monitor'));
    }

    



    // ==========================================
    // 2. HALAMAN UNTUK ROLE IT SUPPORT
    // ==========================================
    public function laptop()
    {
        $laptops = DB::table('laptop')->get();
        return view('it.assets.laptop', compact('laptops'));
    }


    public function monitorIt()
    {
        $monitors = DB::table('monitor')->get();
        return view('it.assets.monitor', compact('monitors'));
    }


    public function pc()
    {
        $pcs = DB::table('pc')->get();
        return view('it.assets.pc', compact('pcs'));
    }


    public function eksternal()
    {
        $eksternals = DB::table('perangkat_eksternal')->get();
        return view('it.assets.eksternal', compact('eksternals'));
    }

    public function updateServiceIT(Request $request, $id)
    {
        // Validasi teks tidak boleh kosong
        $request->validate([
            'catatan_service_baru' => 'required|string',
        ]);

        // Pastikan ID berawalan '#' untuk dicocokkan di database
        $kode_pinjam = str_starts_with($id, '#') ? $id : '#' . $id;
        $serviceLama = DB::table('service')->where('kode_pinjam', $kode_pinjam)->first();

        if (!$serviceLama) {
            return back()->with('error', 'Data Service tidak ditemukan!');
        }

        // Stempel Waktu & Penggabungan Teks
        date_default_timezone_set('Asia/Jakarta');
        $waktuSekarang = date('d-m-Y H:i:s');
        
        // catat nama IT yang mengerjakan progres tersebut
        $namaIT = $request->ditangani_oleh; 
        
        // Format untuk tampilan riwayat
        $teksBaru = "[" . $waktuSekarang . " | Oleh: " . $namaIT . "]\n" . $request->catatan_service_baru;

        // Tumpuk teks baru di atas teks lama
        if (!empty($serviceLama->riwayat_service)) {
            $riwayatGabungan = $teksBaru . "\n\n" . $serviceLama->riwayat_service;
        } else {
            $riwayatGabungan = $teksBaru;
        }

        // Update data ke database (update riwayat dan siapa yang menangani)
        DB::table('service')->where('kode_pinjam', $kode_pinjam)->update([
            'riwayat_service' => $riwayatGabungan,
            'ditangani_oleh' => $namaIT      
        ]);

        return back()->with('success', 'Progress perbaikan berhasil diupdate!');
    }

    
    //masih eror
    public function exportMonitorExcel() 
    {
        // Tambahkan \App\Exports\ di depan MonitorExport agar Laravel tahu persis lokasinya
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\MonitorExport, 'Laporan_Monitor_IT.xlsx');
    }

    
    public function exportMonitorPdf()
    {
        // query ini menghasilkan data (Coba tes dengan dd($monitors) jika perlu)
        $monitors = DB::table('monitor')->get();

        // nama variabel di compact('monitors') SAMA dengan yang di-foreach
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('it.assets.monitor_pdf', compact('monitors'));
    
        return $pdf->stream('Laporan_Monitor_IT.pdf');
    }


    // ==========================================
    // 3. HALAMAN UNTUK ROLE HRD
    // ==========================================
    public function laptopHRD()
    {
        $laptops = DB::table('laptop')->get();
        return view('hrd.assets.laptop', compact('laptops'));
    }


    public function monitorHRD()
    {
        $monitors = DB::table('monitor')->get();
        return view('hrd.assets.monitor', compact('monitors'));
    }


    public function pcHRD()
    {
        $pcs = DB::table('pc')->get();
        return view('hrd.assets.pc', compact('pcs'));
    }


    public function eksternalHRD()
    {
        $eksternals = DB::table('perangkat_eksternal')->get();
        return view('hrd.assets.eksternal', compact('eksternals'));
    }
}