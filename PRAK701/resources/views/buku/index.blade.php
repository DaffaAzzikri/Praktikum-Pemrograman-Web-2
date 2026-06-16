@extends('layouts.app')

@section('title', 'Daftar Buku - Perpustakaan')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Manajemen Buku</h1>
        <p class="text-gray-500 mt-2">Daftar seluruh buku perpustakaan</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('buku.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Buku
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead class="bg-gray-50 border-b border-gray-100 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Judul Buku</th>
                    <th class="px-6 py-4">Penulis</th>
                    <th class="px-6 py-4">Penerbit</th>
                    <th class="px-6 py-4">Tahun</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($daftarBuku as $index => $buku)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $buku->judul_buku }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $buku->penulis }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $buku->penerbit }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $buku->tahun_terbit }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-center font-medium space-x-2">
                            <a href="{{ route('buku.show', $buku) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md transition">
                                Detail
                            </a>
                            <a href="{{ route('buku.edit', $buku) }}" class="inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-600 hover:bg-yellow-100 rounded-md transition">
                                Edit
                            </a>
                            <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-md transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="text-4xl mb-2">📭</div>
                            <p>Belum ada data buku.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
