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

    // fumgsi show detail monitor di halaman admin
   public function showMonitorAdmin($id)
    {
        $no_seri_asli = '#' . $id;

        // Mencari data monitor di database menggunakan Nomor Seri yang sudah utuh
        $monitor = DB::table('monitor')->where('no_seri', $no_seri_asli)->first();

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

    public function exportMonitorExcel() 
    {
        $data = DB::table('monitor')->get();
        return Excel::download(new class($data) implements FromCollection, WithHeadings {
            private $data;
            
            public function __construct($data) { 
                $this->data = $data; 
            }
            
            public function collection() { 
                return $this->data; 
            }
            
            public function headings(): array {
                return ["No. Seri", "Merk", "Tahun Pengadaan", "Pemeliharaan", "Jumlah", "Kondisi"];
            }
        }, 'Laporan_Monitor_IT.xlsx');
    }

    public function exportMonitorPdf()
    {
        // Pastikan query ini menghasilkan data (Coba tes dengan dd($monitors) jika perlu)
        $monitors = DB::table('monitor')->get();

        // Pastikan nama variabel di compact('monitors') SAMA dengan yang di-foreach
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