@extends('Layouts.App')

@section('content')
    <section class="mx-auto flex min-h-[70vh] w-full px-4 py-10">
        <div class="w-full max-w-4xl mx-auto overflow-hidden rounded-[1.75rem] border border-blue-700 bg-slate-950/95 shadow-2xl shadow-slate-950/40">
            <img src="{{ $detail['gambar'] ?? asset('images/PKKMB.jpg') }}" alt="Dokumentasi {{ $detail['judul'] ?? 'Pengalaman' }}" class="w-full max-h-96 object-cover shadow-2xl shadow-slate-950/50" />

            <div class="space-y-6 px-6 py-8 text-slate-100 sm:px-10">
                <div class="space-y-3">
                    <p class="text-sm uppercase tracking-[0.35em] text-blue-200/70">Detail Pengalaman</p>
                    <h1 class="text-3xl font-semibold leading-tight tracking-tight text-white">{{ $detail['judul'] ?? 'Judul tidak tersedia' }}</h1>
                </div>

                <div class="rounded-[1.5rem] border border-white/10 bg-slate-900/80 p-6 text-slate-300 shadow-inner shadow-slate-950/20">
                    <p class="text-base leading-relaxed">{{ $detail['deskripsi'] ?? $detail['pengalaman'] ?? 'Deskripsi tidak tersedia' }}</p>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('profil') }}" class="inline-flex items-center justify-center rounded-full border border-blue-400 px-8 py-3 text-sm font-semibold text-blue-200 transition duration-300 hover:border-blue-300 hover:bg-blue-500 hover:text-white">Kembali ke Profil</a>
                </div>
            </div>
        </div>
    </section>
@endsection
