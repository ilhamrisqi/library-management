@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Tambah Kategori</h1>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Kategori</label>
                <input type="text" name="nama" id="nama" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Kategori</button>
        </form>
    </div>
@endsection
