@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Edit Kategori</h1>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Kategori</label>
                <input type="text" name="nama" id="nama" value="{{ $kategori->nama }}" class="mt-1 p-2 border rounded w-full" required>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Kategori</button>
        </form>
    </div>
@endsection
