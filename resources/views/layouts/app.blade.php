<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Luna Beauty - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#FDFBF8]">
    <div class="flex min-h-screen">
        
        <aside class="w-64 fixed inset-y-0 left-0 z-50 flex flex-col p-6 shadow-2xl" style="background-color: #D9773D; color: white;">
            <div class="mb-10 px-2">
                <div class="flex items-center gap-2">
                    <h1 class="text-xl font-bold italic">Luna Home Beauty</h1>
                </div>
                <p class="text-xs text-orange-200 mt-1 opacity-80 uppercase tracking-widest">DashBoard Admin</p>
            </div>

            <nav class="flex-1 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition {{ request()->routeIs('dashboard') ? 'bg-white/20 font-bold' : '' }}">
                    <span>📊</span> Dashboard
                </a>
                <a href="{{ route('admin.pelanggan.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition {{ request()->routeIs('admin.pelanggan.*') ? 'bg-white/20 font-bold' : '' }}">
                    <span>👥</span> Data Pelanggan
                </a>
                <a href="{{ route('admin.booking.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition {{ request()->routeIs('admin.booking.*') ? 'bg-white/20 font-bold' : '' }}">
                    <span>📅</span> Booking Layanan
                </a>
                <a href="{{ route('admin.layanan.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition {{ request()->routeIs('admin.layanan.*') ? 'bg-white/20 font-bold' : '' }}">
                    <span>📦</span> Manajemen Layanan
                </a>
                <a href="{{ route('admin.laporan.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition {{ request()->routeIs('admin.laporan.*') ? 'bg-white/20 font-bold' : '' }}">
                    <span>💰</span> Laporan
                </a>
            </nav>

            <div class="pt-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 p-3 w-full text-left rounded-xl hover:bg-red-500 transition text-orange-100 hover:text-white font-semibold italic">
                        <span>↪️</span> Logout
                    </button>
                </form>
            </div>
        </aside>

     <main class="flex-1 ml-64 min-h-screen p-12 bg-[#FDFBF8]">
        {{-- Langsung panggil slot tanpa pembungkus tambahan yang bikin sempit --}}
        {{ $slot }}
    </main>

    </div>
</body>
</html>