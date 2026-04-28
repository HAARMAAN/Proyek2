<x-app-layout>
    {{-- Flatpickr Assets --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <div class="space-y-8">
        {{-- Header & Filter Section --}}
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6">
            <div>
                <h1 class="text-3xl font-extrabold text-[#4A3121]">Laporan Bisnis</h1>
                <p class="text-gray-500 font-medium">Pantau produktivitas treatment Luna Home Beauty</p>
                
                {{-- Quick Filter Shortcuts --}}
                <div class="flex gap-2 mt-4">
                    {{-- Note: Carbon::parse()->format('d/m/Y') memastikan link shortcut ngikut format baru --}}
                    <a href="{{ route('admin.laporan.index', ['start_date' => now()->format('d/m/Y'), 'end_date' => now()->format('d/m/Y')]) }}" 
                       class="px-4 py-1.5 bg-white border border-gray-100 rounded-full text-xs font-bold text-gray-500 hover:bg-orange-50 hover:text-[#D9773D] hover:border-orange-200 transition shadow-sm">
                        Hari Ini
                    </a>
                    <a href="{{ route('admin.laporan.index', ['start_date' => now()->startOfMonth()->format('d/m/Y'), 'end_date' => now()->endOfMonth()->format('d/m/Y')]) }}" 
                       class="px-4 py-1.5 bg-white border border-gray-100 rounded-full text-xs font-bold text-gray-500 hover:bg-orange-50 hover:text-[#D9773D] hover:border-orange-200 transition shadow-sm">
                        Bulan Ini
                    </a>
                </div>
            </div>
            
            {{-- Custom Date Filter (Format Indo dd/mm/yyyy) --}}
            <form action="{{ route('admin.laporan.index') }}" method="GET" class="flex flex-wrap items-center gap-3 bg-white p-2 rounded-3xl shadow-sm border border-gray-50">
                <div class="flex items-center px-4 py-2 bg-gray-50 rounded-2xl border border-transparent focus-within:bg-white focus-within:border-orange-200 transition">
                    <span class="text-[10px] uppercase font-black text-gray-400 mr-3">Dari</span>
                    <input type="text" id="start_date" name="start_date" value="{{ $start_date }}" readonly 
                           class="datepicker border-none bg-transparent p-0 text-sm font-bold focus:ring-0 text-gray-700 w-24 cursor-pointer">
                </div>

                <div class="flex items-center px-4 py-2 bg-gray-50 rounded-2xl border border-transparent focus-within:bg-white focus-within:border-orange-200 transition">
                    <span class="text-[10px] uppercase font-black text-gray-400 mr-3">Sampai</span>
                    <input type="text" id="end_date" name="end_date" value="{{ $end_date }}" readonly 
                           class="datepicker border-none bg-transparent p-0 text-sm font-bold focus:ring-0 text-gray-700 w-24 cursor-pointer">
                </div>

                <button type="submit" class="bg-[#4A3121] hover:bg-black text-white px-6 py-2.5 rounded-2xl text-xs font-bold transition shadow-lg">
                    Filter
                </button>
            </form>
        </div>

        {{-- Ringkasan Laporan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50">
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Total Treatment Selesai</p>
                <h3 class="text-3xl font-black text-gray-800 mt-2">{{ $totalTreatment }} Sesi</h3>
            </div>
            <div class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-gray-50">
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Layanan Terlaris Periode Ini</p>
                <h3 class="text-xl font-bold text-[#D9773D] mt-2 truncate">
                    {{ $layananTerlaris->first()->layanan->layanan_name ?? 'Belum ada data' }}
                </h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-[2.5rem] shadow-sm p-8 border border-gray-50">
                <h2 class="text-xl font-extrabold text-[#4A3121] mb-6">Riwayat Kerja</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-gray-50">
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Tanggal</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Pelanggan</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px]">Layanan</th>
                                <th class="pb-4 font-bold text-gray-400 uppercase text-[10px] text-right">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($laporanBooking as $lb)
                            <tr>
                                <td class="py-4 text-gray-500 font-medium">
                                    {{ \Carbon\Carbon::parse($lb->booking_date)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 font-bold text-gray-800">{{ $lb->user->name ?? 'User' }}</td>
                                <td class="py-4 text-gray-600">{{ $lb->layanan->layanan_name ?? 'Layanan' }}</td>
                                <td class="py-4 text-right">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $lb->location_type == 'home_service' ? 'bg-orange-50 text-orange-500' : 'bg-blue-50 text-blue-500' }}">
                                        {{ str_replace('_', ' ', $lb->location_type) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-gray-300 italic">Tidak ada aktivitas pada periode ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-[#FDFBF8] rounded-[2.5rem] p-8 border border-orange-50">
                <h2 class="text-xl font-extrabold text-[#4A3121] mb-6">Peringkat Layanan</h2>
                <div class="space-y-6">
                    @forelse($layananTerlaris as $index => $lt)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="w-6 h-6 flex items-center justify-center bg-[#4A3121] text-white text-[10px] font-bold rounded-full">{{ $index + 1 }}</span>
                            <p class="font-bold text-gray-700 text-sm">{{ $lt->layanan->layanan_name }}</p>
                        </div>
                        <p class="text-xs font-black text-orange-600">{{ $lt->total }}x</p>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400 italic">Belum ada data.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".datepicker", {
                locale: "id",
                dateFormat: "d/m/Y", // Tampilan dd/mm/yyyy
                disableMobile: "true"
            });
        });
    </script>
</x-app-layout>