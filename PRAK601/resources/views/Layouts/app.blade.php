<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tugas Praktikum')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-nav {
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-950 text-slate-100">
    <div class="min-h-screen flex flex-col">
        <header class="w-full fixed top-0 left-0 z-20">
            <nav class="glass-nav mx-auto flex max-w-7xl items-center justify-between px-6 py-4 shadow-xl shadow-slate-950/20">
                <div class="text-lg font-semibold tracking-wide text-white">
                    PRAK601 - Pemrograman Web II
                </div>
                <div class="flex items-center gap-6 text-sm font-medium text-slate-100">
                    <a href="{{ route('beranda') }}" class="transition duration-300 hover:text-white hover:underline hover:underline-offset-8">Beranda</a>
                    <a href="{{ route('profil') }}" class="transition duration-300 hover:text-white hover:underline hover:underline-offset-8">Profil</a>
                </div>
            </nav>
        </header>

        <main class="flex flex-1 items-center justify-center px-6 pt-28 pb-10">
            <div class="w-full max-w-5xl rounded-3xl border border-white/10 bg-slate-950/40 p-10 shadow-2xl shadow-slate-950/40 backdrop-blur-xl">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
