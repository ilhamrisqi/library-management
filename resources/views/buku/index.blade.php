@extends('layouts.app')

@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white h-screen p-6">
            <h1 class="text-3xl font-bold mb-8">Admin Penyewaan Buku</h1>
            <nav>
                <ul>
                    <!-- Link Buku -->
                    <li class="mb-5">
                        <a href="{{ url('/buku') }}" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
                            Buku
                        </a>
                    </li>
                    <!-- Link Anggota -->
                    <li class="mb-5">
                        <a href="{{ url('/anggota') }}" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
                            Anggota
                        </a>
                    </li>
                    <!-- Link Kategori -->
                    <li class="mb-5">
                        <a href="{{ url('/kategori') }}" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
                            Kategori
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Konten -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Daftar Buku</h1>

            <!-- Form Filter Kategori -->
            <form action="{{ route('buku.index') }}" method="GET" class="mb-6">
                <div class="flex items-center space-x-4">
                    <select name="kategori" id="kategori" class="px-4 py-2 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Filter</button>
                </div>
            </form>

            <a href="{{ route('buku.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-6 inline-block hover:bg-blue-600 transition">Tambah Buku</a>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Judul</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Penulis</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Kategori</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Nama Peminjam</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Status</th>
                            <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bukus as $item)
                            <tr class="hover:bg-gray-100 transition-all duration-200">
                                <td class="py-3 px-6 border-b text-gray-700">{{ $item->judul }}</td>
                                <td class="py-3 px-6 border-b text-gray-700">{{ $item->penulis }}</td>
                                <td class="py-3 px-6 border-b">
                                    @if ($item->kategori->isEmpty())
                                        <span class="text-gray-500 italic">Tidak ada kategori</span>
                                    @else
                                        @foreach ($item->kategori as $kategori)
                                            <span class="bg-gray-200 text-gray-700 text-sm px-2 py-1 rounded">{{ $kategori->nama }}</span><br>
                                        @endforeach
                                    @endif
                                </td>

                                <td class="py-3 px-6 border-b">
                                    @if ($item->anggota_id)
                                        <span>{{ $item->anggota->nama }}</span>
                                    @else
                                        <span class="text-gray-500 italic">Belum dipinjam</span>
                                    @endif
                                </td>

                                <td class="py-3 px-6 border-b">
                                    @if (!$item->anggota_id)
                                        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md mt-4 w-full hover:bg-red-600 transition" onclick="showForm('{{ $item->id }}')">
                                            Pinjam Buku
                                        </button>
                                    @else
                                        <span class="text-gray-500 italic">Sudah dipinjam</span>
                                    @endif
                                </td>

                                <td class="py-3 px-6 border-b">
                                    <a href="{{ route('buku.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">Edit</a> |
                                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-3 px-6 text-center text-gray-500">Tidak ada data buku yang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $bukus->links() }}
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan form peminjaman
        function showForm(id) {
            document.getElementById('pinjamForm' + id).classList.remove('hidden');
        }

        // Fungsi untuk menyembunyikan form peminjaman
        function hideForm(id) {
            document.getElementById('pinjamForm' + id).classList.add('hidden');
        }
    </script>

@endsection
