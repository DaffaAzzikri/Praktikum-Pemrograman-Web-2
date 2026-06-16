<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalMember = Member::count();
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        $totalDikembalikan = Peminjaman::where('status', 'dikembalikan')->count();

        return view('dashboard', compact(
            'totalBuku',
            'totalMember',
            'peminjamanAktif',
            'totalDikembalikan'
        ));
    }
}
