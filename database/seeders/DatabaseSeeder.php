use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Anggota;

public function run()
{
    // Membuat kategori
    $kategori1 = Kategori::create(['nama' => 'Fiksi']);
    $kategori2 = Kategori::create(['nama' => 'Non-Fiksi']);

    // Membuat anggota
    $anggota = Anggota::create([
        'nama' => 'User Test',
        'email' => 'usertest@example.com',
        'password' => bcrypt('password123'),
    ]);

    // Membuat buku dan mengaitkan kategori menggunakan attach
    $buku1 = Buku::create([
        'judul' => 'Harry Potter',
        'penulis' => 'J.K. Rowling',
        'tahun_terbit' => 2000,
        'anggota_id' => $anggota->id, // Menyertakan anggota_id (pengguna yang sedang login)
    ]);
    $buku1->kategori()->attach($kategori1->id); // Menambahkan kategori Fiksi ke buku

    $buku2 = Buku::create([
        'judul' => 'Sapiens',
        'penulis' => 'Yuval Noah Harari',
        'tahun_terbit' => 2011,
        'anggota_id' => $anggota->id, // Menyertakan anggota_id (pengguna yang sedang login)
    ]);
    $buku2->kategori()->attach($kategori2->id); // Menambahkan kategori Non-Fiksi ke buku
}
