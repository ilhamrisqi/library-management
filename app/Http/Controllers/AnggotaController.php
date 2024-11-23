<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:anggotas,email',
            'alamat' => 'required',
            
        ]);
        Anggota::create($request->only('nama', 'email','alamat'));
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(String $id)
    {

        $anggota = Anggota::findOrFail($id);

        return view('anggota.edit', compact('anggota'));
    }

   
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:anggotas,email,' . $id,
            'alamat' => 'required',
        ]);
    
        // Temukan anggota berdasarkan ID
        $anggota = Anggota::findOrFail($id); // Jika tidak ditemukan, akan menampilkan 404
    
        // Perbarui data anggota
        $anggota->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diupdate.');
    }
    


    public function destroy(String $id)
    {
        // Temukan anggota berdasarkan ID
        $anggota = Anggota::findOrFail($id); // Jika tidak
        // Menghapus anggota
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }


    
}