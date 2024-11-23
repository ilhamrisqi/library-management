<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'anggota_id', 
        'buku_id', 
        'tanggal_peminjaman', 
        'tanggal_pengembalian',
        'status'
    ];

    // Relasi dengan anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class); // Pastikan Anda memiliki model Anggota
    }

    // Relasi dengan buku
    public function buku()
    {
        return $this->belongsTo(Buku::class); // Pastikan Anda memiliki model Buku
    }
}

