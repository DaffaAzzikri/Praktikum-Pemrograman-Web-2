<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class PageController extends Controller
{
    public function beranda()
    {
        $data = Profile::getStudentData();
        return view('beranda', compact('data'));
    }

    public function profil()
    {
        $profil = Profile::getStudentData();
        $pengalaman = Profile::getExperiences();
        return view('profil', compact('profil', 'pengalaman'));
    }

    public function detailPengalaman($id)
    {
        $semuaPengalaman = Profile::getExperiences();
        $detail = $semuaPengalaman[$id] ?? abort(404);
        return view('detail', compact('detail'));
    }
}