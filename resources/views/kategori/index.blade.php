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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l-4-4m0 0l4-4m-4 4h16" />
                        </svg>
                        Buku
                    </a>
                </li>
                <!-- Link Anggota -->
                <li class="mb-5">
                    <a href="{{ url('/anggota') }}" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l-4-4m0 0l4-4m-4 4h16" />
                        </svg>
                        Anggota
                    </a>
                </li>
                <!-- Link Kategori -->
                <li class="mb-5">
                    <a href="{{ url('/kategori') }}" class="flex items-center text-lg font-medium hover:text-blue-300 w-full text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l-4-4m0 0l4-4m-4 4h16" />
                        </svg>
                        Kategori
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Konten -->
    <div class="flex-1 p-6">
        @if(session('success'))
        <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 border-l-4 border-green-500">
            {{ session('success') }}
        </div>
        @endif

        <h1 class="text-3xl font-bold mb-6">Daftar Kategori</h1>

        <a href="{{ route('kategori.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-6 inline-block hover:bg-blue-600 transition">Tambah Kategori</a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Nama Kategori</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-700 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr class="hover:bg-gray-100 transition-all duration-200">
                            <td class="py-3 px-6 border-b text-gray-700">{{ $item->nama }}</td>
                            <td class="py-3 px-6 border-b">
                                <a href="{{ route('kategori.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">Edit</a> |
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-3 px-6 text-center text-gray-500">Tidak ada kategori yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $kategori->links() }}
        </div>
    </div>
</div>
@endsection
