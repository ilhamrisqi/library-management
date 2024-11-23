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

        <h1 class="text-3xl font-bold mb-4">Daftar Anggota</h1>

        <a href="{{ route('anggota.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Tambah Anggota
        </a>

        <table class="min-w-full bg-white border border-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Alamat</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->alamat }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('anggota.edit', $item->id) }}" class="text-yellow-500">Edit</a> |
                            <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus Anggota ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
