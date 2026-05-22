<x-app-layout>

    {{-- IMPORT FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <x-slot name="header">
        <div class="flex justify-between items-center"
             style="font-family: 'Poppins', sans-serif;">

            <h2 class="text-3xl font-bold"
                style="font-family: 'Playfair Display', serif; color: #4E3629;">
                {{ __('Manajemen Booking') }}
            </h2>

            <a href="{{ route('admin.booking.history') }}"
               class="text-sm font-semibold underline transition"
               style="color: #D96B34;">
                Lihat Semua Riwayat →
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FDF6F0]"
         style="font-family: 'Poppins', sans-serif;">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- FILTER --}}
            <div class="flex flex-wrap gap-3 mb-6 bg-white p-3 rounded-[24px] border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                {{-- MENUNGGU --}}
                <a href="{{ route('admin.booking.index', ['status' => 'pending']) }}"
                   class="px-5 py-3 text-sm font-semibold rounded-2xl transition
                   {{ request('status', 'pending') == 'pending'
                        ? 'text-white shadow-md'
                        : 'bg-[#FFF7F1] text-[#7A5C48] hover:bg-[#F8ECE3]' }}"
                   style="{{ request('status', 'pending') == 'pending'
                        ? 'background-color: #D96B34;'
                        : '' }}">
                    Menunggu
                </a>

                {{-- DIKONFIRMASI --}}
                <a href="{{ route('admin.booking.index', ['status' => 'confirmed']) }}"
                   class="px-5 py-3 text-sm font-semibold rounded-2xl transition
                   {{ request('status') == 'confirmed'
                        ? 'text-white shadow-md'
                        : 'bg-[#FFF7F1] text-[#7A5C48] hover:bg-[#F8ECE3]' }}"
                   style="{{ request('status') == 'confirmed'
                        ? 'background-color: #D96B34;'
                        : '' }}">
                    Dikonfirmasi
                </a>

                {{-- SELESAI --}}
                <a href="{{ route('admin.booking.index', ['status' => 'completed']) }}"
                   class="px-5 py-3 text-sm font-semibold rounded-2xl transition
                   {{ request('status') == 'completed'
                        ? 'text-white shadow-md'
                        : 'bg-[#FFF7F1] text-[#7A5C48] hover:bg-[#F8ECE3]' }}"
                   style="{{ request('status') == 'completed'
                        ? 'background-color: #D96B34;'
                        : '' }}">
                    Selesai
                </a>

                {{-- DIBATALKAN --}}
                <a href="{{ route('admin.booking.index', ['status' => 'cancelled']) }}"
                   class="px-5 py-3 text-sm font-semibold rounded-2xl transition
                   {{ request('status') == 'cancelled'
                        ? 'text-white shadow-md'
                        : 'bg-[#FFF7F1] text-[#7A5C48] hover:bg-[#F8ECE3]' }}"
                   style="{{ request('status') == 'cancelled'
                        ? 'background-color: #D96B34;'
                        : '' }}">
                    Dibatalkan
                </a>

            </div>

            {{-- TABLE --}}
            <div class="bg-white overflow-hidden rounded-[30px] border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <div class="overflow-x-auto">

                    <table class="w-full text-left border-separate border-spacing-y-3">

                        {{-- HEAD --}}
                        <thead>
                            <tr class="text-sm font-semibold"
                                style="color: #4E3629;">

                                <th class="px-6 py-5">Nama Pelanggan</th>
                                <th class="px-6 py-5">Jenis Layanan</th>
                                <th class="px-6 py-5">Tanggal</th>
                                <th class="px-6 py-5">Jam</th>
                                <th class="px-6 py-5">Lokasi</th>
                                <th class="px-6 py-5">Status</th>
                                <th class="px-6 py-5">Aksi</th>

                            </tr>
                        </thead>

                        {{-- BODY --}}
                        <tbody>

                            @forelse($bookings as $item)

                            <tr class="bg-white rounded-2xl transition border border-[#F3E3D7] hover:bg-[#FFF7F1]">

                                {{-- NAMA --}}
                                <td class="px-6 py-5 font-semibold"
                                    style="color: #4E3629;">
                                    {{ $item->user->name ?? 'User' }}
                                </td>

                                {{-- LAYANAN --}}
                                <td class="px-6 py-5 text-sm"
                                    style="color: #7A5C48;">
                                    {{ $item->layanan->layanan_name ?? 'Layanan' }}
                                </td>

                                {{-- TANGGAL --}}
                                <td class="px-6 py-5 text-sm"
                                    style="color: #7A5C48;">
                                    {{ \Carbon\Carbon::parse($item->booking_date)->translatedFormat('d F Y') }}
                                </td>

                                {{-- JAM --}}
                                <td class="px-6 py-5 text-sm"
                                    style="color: #7A5C48;">
                                    {{ \Carbon\Carbon::parse($item->booking_time)->format('H:i') }} WIB
                                </td>

                                {{-- LOKASI --}}
                                <td class="px-6 py-5 text-sm capitalize"
                                    style="color: #7A5C48;">
                                    {{ $item->location_type }}
                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    @php
                                        $colors = [
                                            'pending' => 'background-color: #FFF1E8; color: #D96B34;',
                                            'confirmed' => 'background-color: #FFF1E8; color: #D96B34;',
                                            'completed' => 'background-color: #FFF1E8; color: #D96B34;',
                                            'cancelled' => 'background-color: #FDECEC; color: #E10303;',
                                        ];

                                        $labels = [
                                            'pending' => 'Menunggu',
                                            'confirmed' => 'Dikonfirmasi',
                                            'completed' => 'Selesai',
                                            'cancelled' => 'Dibatalkan',
                                        ];
                                    @endphp

                                    <span class="px-4 py-2 rounded-full text-xs font-semibold"
                                          style="{{ $colors[$item->status_booking] ?? 'background-color:#F3E3D7; color:#7A5C48;' }}">

                                        {{ $labels[$item->status_booking] ?? $item->status_booking }}

                                    </span>

                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-5">

                                    @if(in_array($item->status_booking, ['completed', 'cancelled']))

                                        <span class="text-[11px] px-3 py-2 rounded-full font-semibold"
                                              style="background-color: #FFF7F1; color: #B98A68;">
                                            Sudah Terarsip
                                        </span>

                                    @else

                                        <div x-data="{ open: false }"
                                             class="relative inline-block text-left">

                                            <button @click="open = !open"
                                                    class="flex items-center gap-2 px-4 py-3 rounded-2xl text-sm font-semibold border transition"
                                                    style="background-color: #FFF7F1; color: #7A5C48; border-color: #F3E3D7;">

                                                Ubah Status

                                                <svg class="w-4 h-4"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 9l-7 7-7-7">
                                                    </path>
                                                </svg>

                                            </button>

                                            <div x-show="open"
                                                 @click.away="open = false"
                                                 class="absolute right-0 mt-3 w-52 bg-white rounded-2xl border border-[#F3E3D7] overflow-hidden z-50"
                                                 style="display: none; box-shadow: 0 10px 30px rgba(217,107,52,0.15);"
                                                 x-transition>

                                                <form action="{{ route('admin.booking.updateStatus', $item->id) }}"
                                                      method="POST">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button name="status_booking"
                                                            type="submit"
                                                            value="pending"
                                                            class="w-full text-left px-5 py-4 text-sm hover:bg-[#FFF7F1] transition"
                                                            style="color: #7A5C48;">
                                                        Menunggu
                                                    </button>

                                                    <button name="status_booking"
                                                            type="submit"
                                                            value="confirmed"
                                                            class="w-full text-left px-5 py-4 text-sm hover:bg-[#FFF7F1] transition"
                                                            style="color: #7A5C48;">
                                                        Dikonfirmasi
                                                    </button>

                                                    <button name="status_booking"
                                                            type="submit"
                                                            value="completed"
                                                            class="w-full text-left px-5 py-4 text-sm hover:bg-[#FFF7F1] transition border-t border-[#F3E3D7]"
                                                            style="color: #D96B34;">
                                                        Selesai
                                                    </button>

                                                    <button name="status_booking"
                                                            type="submit"
                                                            value="cancelled"
                                                            class="w-full text-left px-5 py-4 text-sm hover:bg-[#FDECEC] transition border-t border-[#F3E3D7]"
                                                            style="color: #E10303;">
                                                        Batalkan
                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="7"
                                    class="px-6 py-24 text-center">

                                    <div class="flex flex-col items-center justify-center">

                                        <div class="bg-[#FFF7F1] p-6 rounded-full mb-4">

                                            <svg class="w-12 h-12 text-[#D9B8A0]"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                                </path>

                                            </svg>

                                        </div>

                                        <h3 class="text-xl font-bold italic"
                                            style="font-family: 'Playfair Display', serif; color: #4E3629;">

                                            Data Tidak Ditemukan

                                        </h3>

                                        <p class="text-sm mt-2"
                                           style="color: #7A5C48;">

                                            Tidak ada booking dengan status ini.

                                        </p>

                                    </div>

                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>