@extends('layouts.app')

@section('title', 'Tambah Buku - Perpustakaan')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Buku Baru</h1>
    <p class="text-gray-500 mt-2">Isi formulir di bawah untuk menambahkan buku baru ke perpustakaan</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label for="judul_buku" class="block text-sm font-semibold text-gray-600 mb-2">Judul Buku</label>
            <input type="text" name="judul_buku" id="judul_buku"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('judul_buku') border-red-500 @enderror"
                   value="{{ old('judul_buku') }}"
                   placeholder="Masukkan judul buku">
            @error('judul_buku')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="penulis" class="block text-sm font-semibold text-gray-600 mb-2">Penulis</label>
            <input type="text" name="penulis" id="penulis"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('penulis') border-red-500 @enderror"
                   value="{{ old('penulis') }}"
                   placeholder="Masukkan nama penulis">
            @error('penulis')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="penerbit" class="block text-sm font-semibold text-gray-600 mb-2">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('penerbit') border-red-500 @enderror"
                   value="{{ old('penerbit') }}"
                   placeholder="Masukkan nama penerbit">
            @error('penerbit')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tahun_terbit" class="block text-sm font-semibold text-gray-600 mb-2">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tahun_terbit') border-red-500 @enderror"
                   value="{{ old('tahun_terbit') }}"
                   placeholder="Contoh: 2023">
            @error('tahun_terbit')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Simpan
            </button>
            <a href="{{ route('buku.index') }}" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-6 rounded-lg transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
