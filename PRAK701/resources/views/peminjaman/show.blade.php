@extends('layouts.app')

@section('title', 'Detail Peminjaman - Perpustakaan')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Detail Transaksi Peminjaman</h1>
        <p class="text-gray-500 mt-2">Informasi lengkap tentang rincian peminjaman buku</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('peminjaman.index') }}" class="inline-flex items-center bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Nama Member</div>
        <div class="md:col-span-2 text-base font-bold text-gray-800">
            {{ $peminjaman->member->nama_member }} 
            <span class="text-gray-400 font-normal text-sm">({{ $peminjaman->member->nomor_member }})</span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Judul Buku</div>
        <div class="md:col-span-2 text-base text-gray-800">
            <div class="font-bold">{{ $peminjaman->buku->judul_buku }}</div>
            <div class="text-sm text-gray-500 mt-1">Penulis: {{ $peminjaman->buku->penulis }} | Penerbit: {{ $peminjaman->buku->penerbit }} ({{ $peminjaman->buku->tahun_terbit }})</div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Tanggal Pinjam</div>
        <div class="md:col-span-2 text-base text-gray-800">{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Tanggal Kembali</div>
        <div class="md:col-span-2 text-base text-gray-800">
            @if($peminjaman->tgl_kembali)
                {{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}
            @else
                <span class="text-gray-400">Belum Dikembalikan</span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Status</div>
        <div class="md:col-span-2 text-base text-gray-800">
            @if($peminjaman->status === 'dikembalikan')
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    Dikembalikan
                </span>
            @else
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                    Dipinjam
                </span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Dibuat Pada</div>
        <div class="md:col-span-2 text-sm text-gray-600">{{ $peminjaman->created_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Diperbarui Pada</div>
        <div class="md:col-span-2 text-sm text-gray-600">{{ $peminjaman->updated_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">
        <a href="{{ route('peminjaman.edit', $peminjaman) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            Edit
        </a>
        <form action="{{ route('peminjaman.destroy', $peminjaman) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
