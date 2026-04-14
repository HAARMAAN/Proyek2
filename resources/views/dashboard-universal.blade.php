<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard {{ ucfirst($role) }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="relative bg-white shadow-2xl overflow-hidden flex" 
         style="width: 1440px; height: 927px; opacity: {{ $role == 'admin' ? '0.9' : '0.75' }};">
        
        <aside class="w-64 {{ $role == 'admin' ? 'bg-slate-900' : 'bg-pink-600' }} text-white p-6">
            <h2 class="text-2xl font-bold mb-8">Luna Beauty</h2>
            <nav class="space-y-4">
                <a href="#" class="block font-bold">Beranda</a>
                
                @if($role == 'admin')
                    <a href="{{ route('admin.pelanggan.index') }}" class="block opacity-80 hover:opacity-100">Data Pelanggan</a>
                    <a href="{{ route('admin.layanan.index') }}" class="block opacity-80 hover:opacity-100">Kelola Layanan</a>
                    <a href="{{ route('admin.laporan.index') }}" class="block opacity-80 hover:opacity-100">Laporan Keuangan</a>
                @else
                    <a href="#" class="block opacity-80 hover:opacity-100">Booking Saya</a>
                    <a href="#" class="block opacity-80 hover:opacity-100">Promo Member</a>
                @endif
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <header class="flex justify-between items-center mb-10 text-gray-800">
                <h1 class="text-3xl font-bold">Halo, {{ $user->name ?? $user->nama }}!</h1>
                <span class="px-4 py-1 rounded-full text-xs font-bold bg-gray-200 uppercase">
                    Login sebagai: {{ $role }}
                </span>
            </header>

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 h-96">
                @if($role == 'admin')
                    <h3 class="text-xl font-bold mb-4">Ringkasan Bisnis Hari Ini</h3>
                    @else
                    <h3 class="text-xl font-bold mb-4">Status Perawatan Anda</h3>
                    <p class="text-gray-500">Belum ada jadwal perawatan untuk hari ini.</p>
                @endif
            </div>
        </main>
    </div>

</body>
</html>