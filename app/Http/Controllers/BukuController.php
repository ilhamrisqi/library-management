<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Anggota;

class BukuController extends Controller
{
    // public function index()
    // {
        // Ambil semua buku, bisa dipaginasi
//         $bukus = Buku::with('kategori')->paginate(10); // Mengambil buku dengan relasi kategori
//         return view('buku.index', compact('bukus', 'anggotas'));
//         $bukus = Buku::with('kategori')->get(); // Ambil buku beserta kategori
//         $kategoris = Kategori::all();
//         $anggotas = Anggota::all(); // Ambil semua kategori untuk dropdown
//         $bukus = Buku::query();

//     if ($request->filled('kategori')) {
//         $bukus->whereHas('kategori', function($query) use ($request) {
//             $query->where('kategori.id', $request->kategori);
//         });
//     }



//          return view('landing', compact('bukus', 'kategoris', 'anggotas'));

// $bukus = Buku::with('kategori')->paginate(10); 

//     // Ambil semua anggota yang terdaftar
//     $anggotas = Anggota::all(); 

//     // Kirim data buku dan anggota ke view
//     return view('buku.index', compact('bukus', 'anggotas'));
//     }
public function index(Request $request)
{
    // Ambil semua buku dengan relasi kategori
    $bukus = Buku::with('kategori')->paginate(10);
    
    // Ambil semua anggota yang terdaftar
    $anggotas = Anggota::all();
    
    // Ambil semua kategori untuk filter
    $kategoris = Kategori::all();

    // Jika ada filter kategori, filter buku berdasarkan kategori
    if ($request->filled('kategori')) {
        $bukus = Buku::whereHas('kategori', function($query) use ($request) {
            $query->where('kategoris.id', $request->kategori); // Pastikan menggunakan nama tabel 'kategoris'
        })->with('kategori')->paginate(10);
    }

    // Kirim data buku, anggota, dan kategori ke view
    return view('buku.index', compact('bukus', 'anggotas', 'kategoris'));
}



   
    public function create()
    {
        // Ambil semua kategori untuk ditampilkan di form
        $kategori = Kategori::all();
        
        return view('buku.create', compact('kategori'));
    }


    public function edit($id)
    {
    // Ambil data buku berdasarkan ID
    $buku = Buku::findOrFail($id);

    // Ambil semua kategori dan anggota
    $kategori = Kategori::all();
    
    // Ambil kategori yang sudah terpilih pada buku
    $selectedKategori = $buku->kategori->pluck('id')->toArray();

    return view('buku.edit', compact('buku', 'kategori',));
    }

    public function update(Request $request, $id)
        {      
    // Validasi input
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
        'kategori_id' => 'required|array', 
        'kategori_id.*' => 'exists:kategoris,id', 
        
    ]);

        // Temukan buku yang ingin diupdate
        $buku = Buku::findOrFail($id);

        // Perbarui data buku
        $buku->update([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'tahun_terbit' => $request->tahun_terbit,
        
        ]);

        // Hapus kategori lama dan tambahkan kategori yang baru
        $buku->kategori()->sync($request->kategori_id);

        // Redirect setelah update
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
        }

    public function destroy($id)
    {
    // Temukan buku berdasarkan ID
    $buku = Buku::findOrFail($id);

    // Hapus buku beserta relasi kategori yang terhubung
    $buku->kategori()->detach();  // Hapus relasi kategori, jika ada
    $buku->delete();  // Hapus buku dari tabel

    // Redirect dengan pesan sukses
    return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
        'kategori_id' => 'required|array', 
        'kategori_id.*' => 'exists:kategoris,id', // Validasi ID kategori
        
    ]);

    // Ambil ID anggota yang sedang login
    $anggotaId = auth()->id(); // Ambil ID anggota dari auth

    // Pastikan ada anggota yang login
    if (!$anggotaId) {
        return redirect()->back()->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Simpan data buku
    $buku = Buku::create([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'tahun_terbit' => $request->tahun_terbit,
         // Gunakan ID anggota yang sedang login
    ]);

    // Tambahkan kategori yang dipilih ke buku
    $buku->kategori()->attach($request->kategori_id);

    // Redirect setelah menyimpan
    return redirect()->route('buku.index')->with('success', 'Buku berhasil disimpan!');
}

public function borrow(Request $request, $id)
{
    // Validasi input untuk anggota yang meminjam buku
    $validatedData = $request->validate([
        'anggota_id' => 'required|exists:anggotas,id',  // Validasi ID anggota yang dipilih
    ]);

    // Temukan buku yang ingin dipinjam
    $buku = Buku::findOrFail($id);

    // Update status peminjaman buku dengan ID anggota yang dipilih
    $buku->anggota_id = $request->anggota_id;  // Mengupdate ID anggota pada buku
    $buku->save();  // Simpan perubahan

    // Redirect dengan pesan sukses
    return redirect()->route('buku.index')->with('success', 'Buku berhasil dipinjam!');
}


}
