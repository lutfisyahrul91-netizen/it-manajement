<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 1. Menampilkan halaman form login
    public function index()
    {
        return view('auth.login');
    }

    // 2. Memproses data dari form saat tombol "Login" diklik
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required'], // Menggunakan 'username' sesuai name di form
            'password' => ['required'],
        ]);

        // Proses pengecekan ke database
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            
            // Jika berhasil login, perbarui session
            $request->session()->regenerate();

            // Cek Role User yang sedang login
            $role = Auth::user()->role;

            // ==========================================================
            // PERBAIKAN DI SINI: SESUAIKAN DENGAN NAMA DI DATABASE MYSQL
            // ==========================================================
            if ($role === 'IT Support') {
                return redirect()->route('it.dashboard');
            } elseif ($role === 'HRD') {
                return redirect()->route('hrd.dashboard');
            } elseif ($role === 'Admin') {
                return redirect()->route('admin.dashboard');
            }

            // Fallback jika role adalah 'Staff' atau tidak dikenali
            return redirect('/');
        }

        // Jika username/password salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username'); // Mengembalikan input username agar tidak perlu mengetik ulang
    }

    // 3. Memproses Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Mengeluarkan user dari sesi

        $request->session()->invalidate(); // Menghapus semua data sesi

        $request->session()->regenerateToken(); // Membuat ulang token keamanan CSRF

        return redirect('/login'); // Arahkan kembali ke halaman login
    }
}