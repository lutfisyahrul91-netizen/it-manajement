<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Beritahu Laravel nama tabelnya adalah 'user' 
    protected $table = 'user';

    // Beritahu Laravel bahwa Primary Key-nya adalah 'username' 
    protected $primaryKey = 'username';

    // Matikan auto-increment karena primary key berupa string/huruf
    public $incrementing = false;

    // Set tipe primary key menjadi string
    protected $keyType = 'string';

    // Matikan timestamps karena tabel kita belum memakai created_at dan updated_at
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'nama_user',   // Mengganti 'name' menjadi 'nama_user' sesuai database
        'email',
        'password',
        'role',
        'kode_divisi', // Tambahan sesuai kolom database
        'status',      // Tambahan sesuai kolom database
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Dihapus email_verified_at karena belum ada di database kita
            'password' => 'hashed',
        ];
    }
}