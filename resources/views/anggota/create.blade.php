@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        
        <h1 class="text-3xl font-bold mb-4">Tambah Anggota</h1>

        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                <input type="text" id="nama" name="nama"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>
            

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Anggota</button>
        </form>
    </div>
@endsection
