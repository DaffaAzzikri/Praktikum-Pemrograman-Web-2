@extends('layouts.app')

@section('title', 'Edit Peminjaman - Perpustakaan')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Edit Transaksi Peminjaman</h1>
    <p class="text-gray-500 mt-2">Perbarui rincian transaksi peminjaman buku</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
            <div>
                <label for="member_id" class="block text-sm font-semibold text-gray-600 mb-2">Nama Member</label>
                <select name="member_id" id="member_id" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('member_id') border-red-500 @enderror">
                    <option value="">-- Pilih Member --</option>
                    @foreach($daftarMember as $member)
                        <option value="{{ $member->id }}" {{ old('member_id', $peminjaman->member_id) == $member->id ? 'selected' : '' }}>
                            {{ $member->nama_member }} ({{ $member->nomor_member }})
                        </option>
                    @endforeach
                </select>
                @error('member_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="buku_id" class="block text-sm font-semibold text-gray-600 mb-2">Judul Buku</label>
                <select name="buku_id" id="buku_id" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('buku_id') border-red-500 @enderror">
                    <option value="">-- Pilih Buku --</option>
                    @foreach($daftarBuku as $buku)
                        <option value="{{ $buku->id }}" {{ old('buku_id', $peminjaman->buku_id) == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul_buku }} - {{ $buku->penulis }}
                        </option>
                    @endforeach
                </select>
                @error('buku_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
            <div>
                <label for="tgl_pinjam" class="block text-sm font-semibold text-gray-600 mb-2">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tgl_pinjam') border-red-500 @enderror"
                       value="{{ old('tgl_pinjam', $peminjaman->tgl_pinjam) }}">
                @error('tgl_pinjam')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tgl_kembali" class="block text-sm font-semibold text-gray-600 mb-2">Tanggal Kembali (Opsional)</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tgl_kembali') border-red-500 @enderror"
                       value="{{ old('tgl_kembali', $peminjaman->tgl_kembali) }}">
                @error('tgl_kembali')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="status" class="block text-sm font-semibold text-gray-600 mb-2">Status Peminjaman</label>
            <select name="status" id="status" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror">
                <option value="dipinjam" {{ old('status', $peminjaman->status) === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ old('status', $peminjaman->status) === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Perbarui
            </button>
            <a href="{{ route('peminjaman.index') }}" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-6 rounded-lg transition duration-300">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
