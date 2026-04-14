<x-app-layout>
    <div class="space-y-8">
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-extrabold text-[#4A3121]">Laporan Bisnis</h1>
                <p class="text-gray-500 font-medium">Pantau pertumbuhan Luna Home Beauty</p>
            </div>
            
            {{-- Filter Tanggal --}}
            <form action="{{ route('admin.laporan.index') }}" method="GET" class="flex gap-3 bg-white p-3 rounded-3xl shadow-sm border border-gray-100">
                <input type="date" name="start_date" value="{{ $start_date }}" class="border-none bg-transparent text-sm focus:ring-0">
                <span class="text-gray-300 self-center">sampai</span>
                <input type="date" name="end_date" value="{{ $end_date }}" class="border-none bg-transparent text-sm focus:ring-0">
                <button type="submit" class="bg-[#4A3121] text-white px-6 py-2 rounded-2xl text-xs font-bold transition hover:bg-black">Filter</button>
            </form>
        </div>

        {{-- Ringkasan Laporan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50">
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Total Pendapatan</p>
                <h3 class="text-3xl font-black text-[#D9773D] mt-2">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
            </div>
            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50">
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Treatment Selesai</p>
                <h3 class="text-3xl font-black text-gray-800 mt-2">{{ $totalTreatment }} Sesi</h3>
            </div>
            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50">
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Layanan Terlaris</p>
                <h3 class="text-lg font-bold text-gray-800 mt-2 truncate">{{ $layananTerlaris->first()->layanan->layanan_name ?? '-' }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Tabel Detail Transaksi --}}
            <div class="lg:col-span-2 bg-white rounded-[2.5rem] shadow-sm p-8 border border-gray-50">
                <h2 class="text-xl font-extrabold text-[#4A3121] mb-6">Detail Transaksi</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-gray-50">
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Tanggal</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Pelanggan</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Layanan</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Lokasi</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px] text-right">Biaya</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($laporanBooking as $lb)
                            <tr>
                                <td class="py-4 text-gray-500">{{ date('d M Y', strtotime($lb->booking_date)) }}</td>
                                <td class="py-4 font-bold text-gray-800">{{ $lb->user->name }}</td>
                                <td class="py-4 text-gray-600">{{ $lb->layanan->layanan_name }}</td>
                                <td class="py-4 text-xs font-bold uppercase {{ $lb->location_type == 'home_service' ? 'text-orange-500' : 'text-blue-500' }}">
                                    {{ str_replace('_', ' ', $lb->location_type) }}
                                </td>
                                <td class="py-4 text-right font-black text-gray-800">Rp {{ number_format($lb->layanan->price, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Top Layanan Ranking --}}
            <div class="bg-[#FDFBF8] rounded-[2.5rem] p-8 border border-orange-50">
                <h2 class="text-xl font-extrabold text-[#4A3121] mb-6">Top Layanan</h2>
                <div class="space-y-6">
                    @foreach($layananTerlaris as $index => $lt)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="w-6 h-6 flex items-center justify-center bg-[#4A3121] text-white text-[10px] font-bold rounded-full">{{ $index + 1 }}</span>
                            <p class="font-bold text-gray-700 text-sm">{{ $lt->layanan->layanan_name }}</p>
                        </div>
                        <p class="text-xs font-black text-orange-600">{{ $lt->total }}x</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>