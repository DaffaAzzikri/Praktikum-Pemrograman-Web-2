@extends('Layouts.App')

@section('content')
    <section class="mx-auto flex min-h-[60vh] w-full items-center justify-center px-4 py-8">
        <div class="w-full max-w-3xl rounded-[2rem] border border-blue-800/40 bg-white/10 p-10 shadow-2xl shadow-slate-950/30 backdrop-blur-3xl animate-fade-in-up">
            <div class="space-y-4 text-center text-slate-100">
                <p class="text-sm uppercase tracking-[0.35em] text-blue-200/90">Selamat Datang</p>
                <h1 class="text-4xl font-semibold leading-tight sm:text-5xl">Selamat Datang di Halaman Praktikum</h1>
                <div class="mx-auto mt-6 max-w-xl rounded-3xl bg-slate-950/50 px-8 py-6 text-left shadow-lg shadow-slate-950/30 backdrop-blur-xl">
                    <p class="text-lg text-slate-200">Nama: <span class="font-semibold text-white">{{ $data['nama'] ?? 'Tidak tersedia' }}</span></p>
                    <p class="mt-2 text-lg text-slate-200">NIM: <span class="font-semibold text-white">{{ $data['nim'] ?? 'Tidak tersedia' }}</span></p>
                </div>
            </div>
        </div>
    </section>
@endsection
