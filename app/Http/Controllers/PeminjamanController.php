<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    // Menyimpan data peminjaman
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'buku_id' => 'required|exists:buku,id',
            'tanggal_peminjaman' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan'
        ]);

        // Simpan peminjaman
        Peminjaman::create([
            'anggota_id' => $validatedData['anggota_id'],
            'buku_id' => $validatedData['buku_id'],
            'tanggal_peminjaman' => $validatedData['tanggal_peminjaman'],
            'status' => $validatedData['status']
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disimpan!');
    }

    // Update status pengembalian
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validatedData = $request->validate([
            'tanggal_pengembalian' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan'
        ]);

        $peminjaman->update([
            'tanggal_pengembalian' => $validatedData['tanggal_pengembalian'],
            'status' => $validatedData['status']
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman diperbarui!');
    }
}
