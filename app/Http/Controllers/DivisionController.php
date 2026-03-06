<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
    // ==========================================
    // ROLE: ADMIN
    // ==========================================

    public function indexAdmin()
    {
        $divisis = DB::table('divisi')->get();
        return view('admin.divisions.index', compact('divisis'));
    }

    // ==========================================
    // ROLE: IT SUPPORT
    // ==========================================
    public function index()
    {
        // Mengambil seluruh data dari tabel 'divisi'
        $divisis = DB::table('divisi')->get();

        // Mengirimkan data ke view IT Support
        return view('it.divisions.index', compact('divisis'));
    }
}