@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page - Penyewaan Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Fungsi untuk menampilkan bagian konten yang dipilih
    function showSection(section) {
      const sections = document.querySelectorAll('.content-section');
      sections.forEach((el) => el.classList.add('hidden')); // Sembunyikan semua
      document.getElementById(section)?.classList.remove('hidden'); // Tampilkan bagian yang dipilih
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Sidebar dan Konten -->
  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white h-screen p-6">
      <h1 class="text-3xl font-bold mb-8">Admin Penyewaan Buku</h1>
      <nav>
        <ul>
          <!-- Link Buku -->
          <li class="mb-5">
            <button onclick="showSection('buku')" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l-4-4m0 0l4-4m-4 4h16" />
              </svg>
              Buku
            </button>
          </li>
          <!-- Link Anggota -->
          <li class="mb-5">
            <button onclick="showSection('anggota')" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m8-4a4 4 0 100-8 4 4 0 000 8z" />
              </svg>
              Anggota
            </button>
          </li>
          <!-- Link Kategori -->
          <li>
            <button onclick="showSection('kategori')" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              Kategori
            </button>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <!-- Header -->
      <header class="mb-6">
        <h2 class="text-3xl font-bold">Admin Dashboard</h2>
        <p class="text-sm text-gray-600">Kelola data buku, anggota, dan kategori.</p>
      </header>

      <!-- Konten Dinamis -->
      <div id="content">
        <!-- Buku -->
        <section id="buku" class="content-section mb-8 hidden">
          <h3 class="text-xl font-semibold mb-4">Buku</h3>
          <div class="bg-white shadow rounded-lg p-4">
            <p>Data buku akan ditampilkan di sini.</p>
          </div>
        </section>

        <!-- Anggota -->
        <section id="anggota" class="content-section mb-8 hidden">
          <h3 class="text-xl font-semibold mb-4">Anggota</h3>
          <div class="bg-white shadow rounded-lg p-4">
            <p>Data anggota akan ditampilkan di sini.</p>
          </div>
        </section>

        <!-- Kategori -->
        <section id="kategori" class="content-section mb-8 hidden">
          <h3 class="text-xl font-semibold mb-4">Kategori</h3>
          <div class="bg-white shadow rounded-lg p-4">
            <p>Data kategori akan ditampilkan di sini.</p>
          </div>
        </section>
      </div>
    </main>
  </div>

</body>
</html>
@endsection
