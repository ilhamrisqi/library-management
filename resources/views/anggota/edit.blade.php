@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Update Anggota</h1>
        
        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success bg-green-100 text-green-700 p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulir untuk update anggota -->
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                <input type="text" id="nama" name="nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('nama', $anggota->nama) }}" required>
                @error('nama')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ old('email', $anggota->email) }}" required>
                @error('email')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input id="alamat" name="alamat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" value="{{ $anggota->alamat}}"</input>
                @error('alamat')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Anggota</button>
            </div>
        </form>

        <a href="{{ route('anggota.index') }}" class="btn btn-secondary mt-3 text-blue-600 hover:text-blue-800">Kembali ke Daftar Anggota</a>
    </div>
@endsection
