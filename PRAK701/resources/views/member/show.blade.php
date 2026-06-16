@extends('layouts.app')

@section('title', $member->nama_member . ' - Detail Member')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Detail Member</h1>
        <p class="text-gray-500 mt-2">Informasi lengkap anggota perpustakaan</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('member.index') }}" class="inline-flex items-center bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Nama Member</div>
        <div class="md:col-span-2 text-base font-bold text-gray-800">{{ $member->nama_member }}</div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Nomor Member</div>
        <div class="md:col-span-2 text-base text-gray-800">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                {{ $member->nomor_member }}
            </span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Alamat</div>
        <div class="md:col-span-2 text-base text-gray-800">{{ $member->alamat }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Tanggal Mendaftar</div>
        <div class="md:col-span-2 text-base text-gray-800">{{ \Carbon\Carbon::parse($member->tgl_mendaftar)->format('d M Y') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Tanggal Terakhir Bayar</div>
        <div class="md:col-span-2 text-base text-gray-800">{{ \Carbon\Carbon::parse($member->tgl_terakhir_bayar)->format('d M Y') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Dibuat Pada</div>
        <div class="md:col-span-2 text-sm text-gray-600">{{ $member->created_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="md:col-span-1 text-sm font-semibold text-gray-500">Diperbarui Pada</div>
        <div class="md:col-span-2 text-sm text-gray-600">{{ $member->updated_at->format('d M Y, H:i') }}</div>
    </div>

    <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">
        <a href="{{ route('member.edit', $member) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            Edit
        </a>
        <form action="{{ route('member.destroy', $member) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
