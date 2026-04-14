<x-app-layout>
    <div class="space-y-8">
        {{-- Header Section --}}
        <div>
            <h1 class="text-3xl font-extrabold text-[#4A3121] tracking-tight">Dashboard Admin</h1>
            <p class="text-gray-500 font-medium">Ringkasan statistik dan performa bisnis Luna Beauty</p>
        </div>

        {{-- GRID STATISTIK (Data Dinamis Database) --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50 relative overflow-hidden transition hover:shadow-md">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 rounded-2xl text-blue-500 text-xl">👤</div>
                    <span class="text-green-500 font-bold text-xs bg-green-50 px-2 py-1 rounded-lg">↗ 100%</span>
                </div>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Total Pelanggan</p>
                <h3 class="text-4xl font-black text-gray-800 mt-1">{{ $totalPelanggan }}</h3>
            </div>

            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50 relative overflow-hidden transition hover:shadow-md">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-orange-50 rounded-2xl text-orange-500 text-xl">📅</div>
                    <span class="text-green-500 font-bold text-xs bg-green-50 px-2 py-1 rounded-lg">↗</span>
                </div>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Booking Hari Ini</p>
                <h3 class="text-4xl font-black text-gray-800 mt-1">{{ $bookingMenunggu }}</h3>
            </div>

            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50 relative overflow-hidden transition hover:shadow-md">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-purple-50 rounded-2xl text-purple-500 text-xl">✨</div>
                    <span class="text-green-500 font-bold text-xs bg-green-50 px-2 py-1 rounded-lg">↗</span>
                </div>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Treatment Selesai</p>
                <h3 class="text-4xl font-black text-gray-800 mt-1">{{ $totalBookingSelesai }}</h3>
            </div>

            <div class="bg-[#D9773D] p-7 rounded-[2.5rem] shadow-lg shadow-orange-200 relative overflow-hidden text-white transition hover:scale-[1.02]">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-white/20 rounded-2xl text-xl text-white">💰</div>
                    <span class="text-white/80 font-bold text-xs">Total</span>
                </div>
                <p class="text-orange-100 text-xs uppercase tracking-widest font-bold">Estimasi Pendapatan</p>
                <h3 class="text-2xl font-black mt-1 italic">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </h3>
                <p class="text-[10px] text-orange-200 mt-2 opacity-70">*Berdasarkan treatment selesai</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- TABEL BOOKING TERBARU (Looping Database) --}}
            <div class="bg-white rounded-[2.5rem] shadow-sm p-8 border border-gray-50">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-xl font-extrabold text-[#4A3121]">Booking Terbaru</h2>
                    <a href="{{ route('admin.booking.index') }}" class="text-sm text-orange-600 font-bold hover:underline">Lihat Semua</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($bookingTerbaru as $bt)
                    <div class="flex items-center justify-between p-5 bg-[#FDFBF8] rounded-[1.8rem] border border-transparent hover:border-orange-100 transition">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white shadow-sm rounded-full flex items-center justify-center text-[#D9773D] font-black text-lg border border-orange-50">
                                {{ substr($bt->user->name ?? 'U', 0, 1) }}
                            </div>
                            <div>
                                <p class="font-black text-gray-800">{{ $bt->user->name ?? 'User' }}</p>
                                <p class="text-xs font-medium text-gray-500">{{ $bt->layanan->layanan_name ?? 'Layanan' }}</p>
                            </div>
                        </div>
                        <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest 
                            {{ $bt->status_booking == 'pending' ? 'bg-orange-100 text-orange-600' : 'bg-green-100 text-green-600' }}">
                            {{ $bt->status_booking == 'pending' ? 'menunggu' : 'selesai' }}
                        </span>
                    </div>
                    @empty
                        <div class="text-center py-10">
                            <p class="text-gray-400 italic">Belum ada booking hari ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- SECTION TAMBAHAN: LAYANAN TERLARIS (Atau Top Pelanggan) --}}
            <div class="bg-white rounded-[2.5rem] shadow-sm p-8 border border-gray-50">
                <h2 class="text-xl font-extrabold text-[#4A3121] mb-8">Informasi Layanan</h2>
                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <div class="w-24 h-24 bg-orange-50 rounded-full flex items-center justify-center text-4xl mb-4">✨</div>
                    <p class="text-gray-800 font-bold text-lg">Total {{ $totalLayanan }} Layanan Aktif</p>
                    <p class="text-gray-500 text-sm max-w-[200px] mt-2">Semua layanan sudah tersedia untuk dibooking pelanggan.</p>
                    <a href="{{ route('admin.layanan.index') }}" class="mt-6 px-6 py-3 bg-[#4A3121] text-white rounded-2xl text-sm font-bold shadow-lg shadow-brown-100 transition hover:scale-105">
                        Kelola Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>