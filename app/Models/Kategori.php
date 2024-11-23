<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['nama'];

    public function buku()
    {
        // Menghubungkan model Kategori dengan Buku melalui tabel pivot 'buku_kategori'
        return $this->belongsToMany(Buku::class, 'buku_kategori', 'kategori_id', 'buku_id');
    }
    
}
