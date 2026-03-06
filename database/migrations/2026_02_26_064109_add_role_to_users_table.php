<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan username unik setelah kolom name
            $table->string('username')->unique()->after('name');
            
            // Menambahkan role dengan pilihan: admin, it_support, hrd
            $table->enum('role', ['admin', 'it_support', 'hrd'])
                  ->default('it_support')
                  ->after('password');
        });
    }

    /**
     * Batalkan migration (Rollback).
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom jika migration dibatalkan
            $table->dropColumn(['username', 'role']);
        });
    }
};