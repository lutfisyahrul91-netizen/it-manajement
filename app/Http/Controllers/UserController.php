<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // ==========================================
    // ROLE: ADMIN
    // ==========================================

    public function indexAdmin()
    {
        $users = DB::table('user')
            ->leftJoin('divisi', 'user.kode_divisi', '=', 'divisi.kode')
            ->select('user.*', 'divisi.nama_divisi')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    // ==========================================
    // ROLE: IT SUPPORT
    // ==========================================
    public function index()
    {
        // Logikanya sama persis dengan Admin, mengambil data dari tabel user & divisi
        $users = DB::table('user')
            ->leftJoin('divisi', 'user.kode_divisi', '=', 'divisi.kode')
            ->select('user.*', 'divisi.nama_divisi')
            ->get();

        // Yang membedakan hanya arah View-nya, dikirim ke folder IT Support
        return view('it.users.index', compact('users'));
    }
}