<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = ['judul', 'penulis', 'tahun_terbit', 'anggota_id'];

    // Relasi many-to-many ke model Kategori
    public function kategori()
    {
        // Pastikan Anda memiliki tabel pivot bernama 'buku_kategori'
        return $this->belongsToMany(Kategori::class, 'buku_kategori', 'buku_id', 'kategori_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class); // Relasi ke peminjaman
    }

    public function anggota()
    {
    return $this->belongsTo(Anggota::class);
    }

    


}





