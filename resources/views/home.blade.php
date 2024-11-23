@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Pilih Buku untuk Dipinjam</h1>
        <p class="text-lg text-gray-600 mt-4">Temukan buku yang ingin Anda pinjam dari berbagai kategori.</p>
    </div>

    <!-- Filter Kategori -->
    <div class="flex justify-center mb-8">
        <div class="relative inline-block">
            <select id="category-filter" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                <option value="all">Semua Kategori</option>
                @if ($kategori->kategori->isEmpty())
                    <option disabled>Tidak ada kategori</option>
                @else
                    @foreach ($kategori->kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <!-- Daftar Buku -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="book-list">
        @foreach($bukus as $buku)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ $buku->judul }}</h3>
                <p class="text-gray-600 mt-2">{{ $buku->penulis }}</p>
                <p class="text-gray-500 mt-2">{{ $buku->kategori->pluck('nama')->implode(', ') }}</p>
                <a href="{{ route('buku.detail', $buku->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md mt-4 hover:bg-blue-700 transition">Lihat Detail</a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $bukus->links() }}
    </div>
</div>

<script>
    // Filter Buku berdasarkan Kategori
    document.getElementById('category-filter').addEventListener('change', function () {
        const categoryId = this.value;
        const books = document.querySelectorAll('.book-item');

        books.forEach(book => {
            const bookCategories = book.getAttribute('data-categories').split(',');

            if (categoryId === 'all' || bookCategories.includes(categoryId)) {
                book.classList.remove('hidden');
            } else {
                book.classList.add('hidden');
            }
        });
    });
</script>
@endsection
