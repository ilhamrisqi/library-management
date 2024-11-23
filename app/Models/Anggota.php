<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'email', 'alamat'];

    // Relasi dengan Buku (One to Many)
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class); // Relasi ke peminjaman
    }
}
