@extends('layouts.app')

@section('title', 'Edit Member - Perpustakaan')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Edit Member</h1>
    <p class="text-gray-500 mt-2">Perbarui informasi member "{{ $member->nama_member }}"</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('member.update', $member) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="nama_member" class="block text-sm font-semibold text-gray-600 mb-2">Nama Lengkap</label>
            <input type="text" name="nama_member" id="nama_member"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_member') border-red-500 @enderror"
                   value="{{ old('nama_member', $member->nama_member) }}"
                   placeholder="Masukkan nama lengkap">
            @error('nama_member')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="nomor_member" class="block text-sm font-semibold text-gray-600 mb-2">Nomor Member</label>
            <input type="text" name="nomor_member" id="nomor_member"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nomor_member') border-red-500 @enderror"
                   value="{{ old('nomor_member', $member->nomor_member) }}"
                   placeholder="Contoh: M-001">
            @error('nomor_member')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="alamat" class="block text-sm font-semibold text-gray-600 mb-2">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('alamat') border-red-500 @enderror"
                      placeholder="Masukkan alamat lengkap">{{ old('alamat', $member->alamat) }}</textarea>
            @error('alamat')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="tgl_mendaftar" class="block text-sm font-semibold text-gray-600 mb-2">Tanggal Mendaftar</label>
                <input type="date" name="tgl_mendaftar" id="tgl_mendaftar"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tgl_mendaftar') border-red-500 @enderror"
                       value="{{ old('tgl_mendaftar', $member->tgl_mendaftar) }}">
                @error('tgl_mendaftar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="tgl_terakhir_bayar" class="block text-sm font-semibold text-gray-600 mb-2">Tanggal Terakhir Bayar</label>
                <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tgl_terakhir_bayar') border-red-500 @enderror"
                       value="{{ old('tgl_terakhir_bayar', $member->tgl_terakhir_bayar) }}">
                @error('tgl_terakhir_bayar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Perbarui
            </button>
            <a href="{{ route('member.index') }}" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-6 rounded-lg transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
