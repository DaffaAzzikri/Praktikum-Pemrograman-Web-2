<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $daftarPeminjaman = Peminjaman::with(['member', 'buku'])->latest()->get();

        return view('peminjaman.index', compact('daftarPeminjaman'));
    }

    public function create()
    {
        $daftarMember = Member::orderBy('nama_member')->get();
        $daftarBuku = Buku::orderBy('judul_buku')->get();

        return view('peminjaman.create', compact('daftarMember', 'daftarBuku'));
    }

    public function store(StorePeminjamanRequest $request)
    {
        Peminjaman::create($request->validated());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['member', 'buku']);
        
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $daftarMember = Member::orderBy('nama_member')->get();
        $daftarBuku = Buku::orderBy('judul_buku')->get();

        return view('peminjaman.edit', compact('peminjaman', 'daftarMember', 'daftarBuku'));
    }

    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        $peminjaman->update($request->validated());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
