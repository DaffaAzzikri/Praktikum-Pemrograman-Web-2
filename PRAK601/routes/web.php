<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/pengalaman/{id}', [PageController::class, 'detailPengalaman'])->name('pengalaman.detail');
