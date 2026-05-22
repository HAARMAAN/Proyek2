<x-app-layout>

    {{-- IMPORT FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    {{-- Flatpickr Assets --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <div class="space-y-8"
         style="font-family: 'Poppins', sans-serif;">

        {{-- HEADER --}}
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-6">

            <div>

                <h1 class="text-4xl font-bold"
                    style="font-family: 'Playfair Display', serif; color: #4E3629;">

                    Laporan Bisnis

                </h1>

                <p class="mt-2 text-base"
                   style="color: #7A5C48;">

                    Pantau produktivitas treatment Luna Home Beauty

                </p>

                {{-- QUICK FILTER --}}
                <div class="flex gap-2 mt-4">

                    <a href="{{ route('admin.laporan.index', ['start_date' => now()->format('d/m/Y'), 'end_date' => now()->format('d/m/Y')]) }}"
                       class="px-4 py-2 rounded-full text-xs font-semibold transition border"
                       style="background-color: #FFF7F1; color: #D96B34; border-color: #F3E3D7;">

                        Hari Ini

                    </a>

                    <a href="{{ route('admin.laporan.index', ['start_date' => now()->startOfMonth()->format('d/m/Y'), 'end_date' => now()->endOfMonth()->format('d/m/Y')]) }}"
                       class="px-4 py-2 rounded-full text-xs font-semibold transition border"
                       style="background-color: #FFF7F1; color: #D96B34; border-color: #F3E3D7;">

                        Bulan Ini

                    </a>

                </div>

            </div>

            {{-- FILTER DATE --}}
            <form action="{{ route('admin.laporan.index') }}"
                  method="GET"
                  class="flex flex-wrap items-center gap-3 bg-white p-3 rounded-[25px] border border-[#F3E3D7]"
                  style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <div class="flex items-center px-4 py-3 rounded-2xl border border-[#F3E3D7]"
                     style="background-color: #FFF7F1;">

                    <span class="text-[11px] font-semibold mr-3"
                          style="color: #B98A68;">

                        Dari

                    </span>

                    <input type="text"
                           id="start_date"
                           name="start_date"
                           value="{{ $start_date }}"
                           readonly
                           class="datepicker border-none bg-transparent p-0 text-sm font-semibold focus:ring-0 w-24 cursor-pointer"
                           style="color: #4E3629;">

                </div>

                <div class="flex items-center px-4 py-3 rounded-2xl border border-[#F3E3D7]"
                     style="background-color: #FFF7F1;">

                    <span class="text-[11px] font-semibold mr-3"
                          style="color: #B98A68;">

                        Sampai

                    </span>

                    <input type="text"
                           id="end_date"
                           name="end_date"
                           value="{{ $end_date }}"
                           readonly
                           class="datepicker border-none bg-transparent p-0 text-sm font-semibold focus:ring-0 w-24 cursor-pointer"
                           style="color: #4E3629;">

                </div>

                <button type="submit"
                        class="px-6 py-3 rounded-2xl text-sm font-semibold text-white shadow-md transition hover:scale-[1.01]"
                        style="background-color: #D96B34;">

                    Filter

                </button>

            </form>

        </div>

        {{-- CARD SUMMARY --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white p-7 rounded-[30px] border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <p class="text-xs font-semibold tracking-wide"
                   style="color: #B98A68;">

                    Total Treatment Selesai

                </p>

                <h3 class="text-3xl font-bold mt-2"
                    style="color: #4E3629;">

                    {{ $totalTreatment }} Sesi

                </h3>

            </div>

            <div class="bg-white p-7 rounded-[30px] border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <p class="text-xs font-semibold tracking-wide"
                   style="color: #B98A68;">

                    Layanan Terlaris Periode Ini

                </p>

                <h3 class="text-xl font-bold mt-2 truncate"
                    style="color: #D96B34;">

                    {{ $layananTerlaris->first()->layanan->layanan_name ?? 'Belum ada data' }}

                </h3>

            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- RIWAYAT --}}
            <div class="lg:col-span-2 bg-white rounded-[30px] p-8 border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <h2 class="text-2xl font-bold mb-6"
                    style="font-family: 'Playfair Display', serif; color: #4E3629;">

                    Riwayat Kerja

                </h2>

                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead>

                            <tr class="border-b border-[#F3E3D7]">

                                <th class="pb-4 text-sm font-semibold"
                                    style="color: #4E3629;">

                                    Tanggal

                                </th>

                                <th class="pb-4 text-sm font-semibold"
                                    style="color: #4E3629;">

                                    Pelanggan

                                </th>

                                <th class="pb-4 text-sm font-semibold"
                                    style="color: #4E3629;">

                                    Layanan

                                </th>

                                <th class="pb-4 text-sm font-semibold text-right"
                                    style="color: #4E3629;">

                                    Lokasi

                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-[#F8ECE3]">

                            @forelse($laporanBooking as $lb)

                            <tr class="hover:bg-[#FFF7F1] transition">

                                <td class="py-4 text-sm"
                                    style="color: #7A5C48;">

                                    {{ \Carbon\Carbon::parse($lb->booking_date)->translatedFormat('d M Y') }}

                                </td>

                                <td class="py-4 text-sm font-semibold"
                                    style="color: #4E3629;">

                                    {{ $lb->user->name ?? 'User' }}

                                </td>

                                <td class="py-4 text-sm"
                                    style="color: #7A5C48;">

                                    {{ $lb->layanan->layanan_name ?? 'Layanan' }}

                                </td>

                                <td class="py-4 text-right">

                                    <span class="px-4 py-2 rounded-full text-[11px] font-semibold"
                                          style="background-color: #FFF1E8; color: #D96B34;">

                                        {{ str_replace('_', ' ', $lb->location_type) }}

                                    </span>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="4"
                                    class="py-10 text-center italic"
                                    style="color: #B98A68;">

                                    Tidak ada aktivitas pada periode ini.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- RANKING --}}
            <div class="rounded-[30px] p-8 border border-[#F3E3D7]"
                 style="background-color: #FFF7F1;">

                <h2 class="text-2xl font-bold mb-6"
                    style="font-family: 'Playfair Display', serif; color: #4E3629;">

                    Peringkat Layanan

                </h2>

                <div class="space-y-6">

                    @forelse($layananTerlaris as $index => $lt)

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <span class="w-7 h-7 flex items-center justify-center rounded-full text-white text-[11px] font-semibold"
                                  style="background-color: #D96B34;">

                                {{ $index + 1 }}

                            </span>

                            <p class="text-sm font-semibold"
                               style="color: #4E3629;">

                                {{ $lt->layanan->layanan_name }}

                            </p>

                        </div>

                        <p class="text-sm font-bold"
                           style="color: #D96B34;">

                            {{ $lt->total }}x

                        </p>

                    </div>

                    @empty

                    <p class="text-sm italic"
                       style="color: #B98A68;">

                        Belum ada data.

                    </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".datepicker", {
                locale: "id",
                dateFormat: "d/m/Y",
                disableMobile: "true"
            });
        });
    </script>

</x-app-layout>