@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Edit Buku</h1>

        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" id="judul" name="judul" value="{{ $buku->judul }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" id="penulis" name="penulis" value="{{ $buku->penulis }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id[]" id="kategori_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ in_array($k->id, $buku->kategori->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
        

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Buku</button>
        </form>
    </div>
@endsection
