@extends('Layouts.App')

@section('content')
    <section class="mx-auto flex min-h-[70vh] w-full max-w-7xl flex-col gap-8 px-4 py-8 text-slate-100">
        <div class="rounded-[2rem] border border-blue-700 bg-blue-950/95 p-8 shadow-2xl shadow-slate-950/30">
            <h2 class="text-3xl font-semibold text-white">Profil Mahasiswa</h2>
            <p class="mt-2 text-sm uppercase tracking-[0.3em] text-blue-300/70">Detail Akademik & Personal</p>
            <div class="mt-8 grid gap-8 lg:grid-cols-[220px_1fr] items-center">
                <div class="mx-auto flex h-56 w-56 items-center justify-center rounded-full border-4 border-blue-700 bg-slate-950/70 p-2 shadow-blue-900/50 shadow-lg sm:h-60 sm:w-60">
                    <img src="{{ asset('images/Foto_Profil.jpg') }}" alt="Foto Profil" class="h-full w-full rounded-full object-cover" />
                </div>
                <div class="space-y-4 text-slate-200">
                    <div class="rounded-3xl bg-white/5 p-6 shadow-inner shadow-slate-950/20">
                        <p class="text-sm uppercase tracking-[0.2em] text-blue-200/80">Nama</p>
                        <p class="mt-2 text-xl font-semibold">{{ $profil['nama'] ?? 'Nama tidak tersedia' }}</p>
                    </div>
                    <div class="rounded-3xl bg-white/5 p-6 shadow-inner shadow-slate-950/20">
                        <p class="text-sm uppercase tracking-[0.2em] text-blue-200/80">NIM</p>
                        <p class="mt-2 text-xl font-semibold">{{ $profil['nim'] ?? 'NIM tidak tersedia' }}</p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl bg-white/5 p-6 shadow-inner shadow-slate-950/20">
                            <p class="text-sm uppercase tracking-[0.2em] text-blue-200/80">Prodi</p>
                            <p class="mt-2 text-lg font-medium">{{ $profil['prodi'] ?? 'Prodi tidak tersedia' }}</p>
                        </div>
                        <div class="rounded-3xl bg-white/5 p-6 shadow-inner shadow-slate-950/20">
                            <p class="text-sm uppercase tracking-[0.2em] text-blue-200/80">Hobi</p>
                            <p class="mt-2 text-lg font-medium">{{ $profil['hobi'] ?? 'Hobi tidak tersedia' }}</p>
                        </div>
                    </div>
                    <div class="rounded-3xl bg-white/5 p-6 shadow-inner shadow-slate-950/20">
                        <p class="text-sm uppercase tracking-[0.2em] text-blue-200/80">Skill</p>
                        <p class="mt-2 text-lg font-medium">{{ $profil['skill'] ?? 'Skill tidak tersedia' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-[2rem] border border-blue-700 bg-slate-950/50 p-8 shadow-2xl shadow-slate-950/20 backdrop-blur-xl">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-300">Informasi Tambahan</p>
            <p class="mt-4 text-slate-200 leading-relaxed">{{ $profil['informasi_tambahan'] ?? 'Tidak ada informasi tambahan tersedia.' }}</p>
        </div>

        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-blue-400">Pengalaman paling berkesan</h2>
            <div class="grid gap-6 md:grid-cols-2">
                @foreach($pengalaman as $item)
                    <a href="{{ route('pengalaman.detail', ['id' => $item['id']]) }}" class="group overflow-hidden rounded-[2rem] border border-slate-700 bg-slate-950/95 transition duration-300 hover:border-blue-400 hover:shadow-[0_20px_60px_-30px_rgba(59,130,246,0.8)]">
                        <div class="overflow-hidden">
                            <img src="{{ $item['gambar'] ?? asset('images/PKKMB.jpg') }}" alt="{{ $item['judul'] }}" class="w-full h-48 object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="bg-slate-800 px-6 py-5 text-center">
                            <h3 class="text-xl font-semibold text-white">{{ $item['judul'] }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
