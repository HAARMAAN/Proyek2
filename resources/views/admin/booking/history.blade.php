<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Riwayat Treatment Selesai') }}
            </h2>
            <a href="{{ route('admin.booking.index') }}" class="inline-flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700 transition font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Booking Aktif
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-gray-500 text-sm font-semibold uppercase tracking-wider">
                            <th class="px-6 py-3">Nama Pelanggan</th>
                            <th class="px-6 py-3">Jenis Layanan</th>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Jam</th>
                            <th class="px-6 py-3">Lokasi</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $item)
                        <tr class="bg-white shadow-sm rounded-xl overflow-hidden transition hover:shadow-md border border-gray-100">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $item->user->name ?? 'User' }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $item->layanan->layanan_name ?? 'Layanan' }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ \Carbon\Carbon::parse($item->booking_date)->translatedFormat('d F Y') }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ \Carbon\Carbon::parse($item->booking_time)->format('H:i') }} WIB</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">
                                <span class="capitalize">{{ $item->location_type == 'studio' ? 'Studio' : 'Home Service' }}</span>
                            </td>
                            
                            <td class="px-6 py-4">
                                @php
                                    $colors = [
                                        'completed' => 'bg-green-100 text-green-700',
                                        'cancelled' => 'bg-red-100 text-red-700',
                                    ];
                                    $labels = [
                                        'completed' => 'selesai',
                                        'cancelled' => 'dibatalkan',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $colors[$item->status_booking] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ $labels[$item->status_booking] ?? $item->status_booking }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] uppercase tracking-widest text-gray-400 font-bold bg-gray-50 px-2 py-1 rounded border border-gray-100">
                                        Data Terarsip
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-24 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="bg-gray-50 p-6 rounded-full mb-4">
                                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-700">Belum Ada Riwayat</h3>
                                    <p class="text-gray-500 text-sm max-w-xs mx-auto">Transaksi yang sudah selesai atau dibatalkan akan otomatis muncul di halaman ini.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>