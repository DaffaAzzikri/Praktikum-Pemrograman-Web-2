@extends('layouts.app')

@section('title', $buku->judul_buku . ' - Detail Buku')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Detail Buku</h1>
        <p class="text-gray-500 mt-2">Informasi lengkap buku</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('buku.index') }}" class="inline-flex items-center bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Judul Buku</div>
        <div class="md:col-span-2 text-base font-bold text-gray-800">{{ $buku->judul_buku }}</div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Penulis</div>
        <div class="md:col-span-2 text-base text-gray-800">{{ $buku->penulis }}</div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Penerbit</div>
        <div class="md:col-span-2 text-base text-gray-800">{{ $buku->penerbit }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Tahun Terbit</div>
        <div class="md:col-span-2 text-base text-gray-800">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                {{ $buku->tahun_terbit }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Dibuat Pada</div>
        <div class="md:col-span-2 text-sm text-gray-600">{{ $buku->created_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Diperbarui Pada</div>
        <div class="md:col-span-2 text-sm text-gray-600">{{ $buku->updated_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">
        <a href="{{ route('buku.edit', $buku) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            Edit
        </a>
        <form action="{{ route('buku.destroy', $buku) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
