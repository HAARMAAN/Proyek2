<nav x-data="{ open: false }" class="w-64 bg-[#D9773D] fixed h-full flex flex-col z-50 shadow-2xl">
    <div class="h-24 flex flex-col justify-center px-8 text-white">
        <div class="flex items-center gap-2">
            <span class="text-2xl">✨</span>
            <span class="text-xl font-bold italic tracking-tight">Luna Beauty</span>
        </div>
        <p class="text-[10px] text-orange-200 uppercase tracking-[0.2em] mt-1">Administrator</p>
    </div>

    <div class="flex-1 px-4 space-y-2 mt-4">
        @php
            $menus = [
                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊'],
                ['route' => 'admin.pelanggan.index', 'label' => 'Data Pelanggan', 'icon' => '👥'],
                ['route' => 'admin.booking.index', 'label' => 'Booking Layanan', 'icon' => '📅'],
                ['route' => 'admin.layanan.index', 'label' => 'Manajemen Layanan', 'icon' => '📦'],
                ['route' => 'admin.laporan.index', 'label' => 'Laporan Pendapatan', 'icon' => '💰'],
            ];
        @endphp

        @foreach($menus as $menu)
            <a href="{{ route($menu['route']) }}" 
               class="flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 group
               {{ request()->routeIs($menu['route'] . '*') ? 'bg-white text-[#D9773D] shadow-lg font-bold' : 'text-white hover:bg-white/10' }}">
                <span class="text-xl">{{ $menu['icon'] }}</span>
                <span class="text-sm tracking-wide">{{ $menu['label'] }}</span>
            </a>
        @endforeach
    </div>

    <div class="p-4 border-t border-white/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-4 px-4 py-3 rounded-2xl text-orange-100 hover:bg-red-500 hover:text-white transition-all font-semibold">
                <span>↪️</span> <span>Logout</span>
            </button>
        </form>
    </div>
</nav>