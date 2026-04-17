<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Booking</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-gray-500 text-sm">
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
                        <tr class="bg-white shadow-sm rounded-xl overflow-hidden transition hover:shadow-md">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $item->user->name ?? 'User' }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $item->layanan->layanan_name ?? 'Layanan' }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ \Carbon\Carbon::parse($item->booking_date)->translatedFormat('d F Y') }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ \Carbon\Carbon::parse($item->booking_time)->format('H:i') }} WIB</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $item->location_type == 'studio' ? 'Studio' : 'Home Service' }}</td>
                            
                            <td class="px-6 py-4">
                                @php
                                    $colors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'confirmed' => 'bg-blue-100 text-blue-700',
                                        'completed' => 'bg-green-100 text-green-700',
                                        'cancelled' => 'bg-red-100 text-red-700',
                                    ];
                                    $labels = [
                                        'pending' => 'menunggu',
                                        'confirmed' => 'dikonfirmasi',
                                        'completed' => 'selesai',
                                        'cancelled' => 'dibatalkan',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $colors[$item->status_booking] ?? 'bg-gray-100' }}">
                                    {{ $labels[$item->status_booking] ?? $item->status_booking }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                {{-- Bagian Dropdown Ubah Status Tetap Sama --}}
                                <div x-data="{ open: false }" class="relative inline-block text-left">
                                    <button @click="open = !open" class="flex items-center gap-2 bg-gray-50 border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-100 transition">
                                        Ubah status
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>

                                    <div x-show="open" 
                                        @click.away="open = false" 
                                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-xl z-50 overflow-hidden"
                                        style="display: none;"
                                        x-transition>
                                        
                                        <form action="{{ route('admin.booking.updateStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <button name="status_booking" value="pending" class="w-full text-left px-4 py-3 text-sm hover:bg-yellow-50 flex items-center gap-2">
                                                <span class="w-2 h-2 rounded-full bg-yellow-400"></span> Menunggu
                                            </button>

                                            <button name="status_booking" value="confirmed" class="w-full text-left px-4 py-3 text-sm hover:bg-blue-50 flex items-center gap-2">
                                                <span class="w-2 h-2 rounded-full bg-blue-400"></span> Dikonfirmasi
                                            </button>

                                            <button name="status_booking" value="completed" class="w-full text-left px-4 py-3 text-sm hover:bg-green-50 flex items-center gap-2">
                                                <span class="w-2 h-2 rounded-full bg-green-400"></span> Selesai
                                            </button>

                                            <div class="border-t border-gray-100"></div>
                                            
                                            <button name="status_booking" value="cancelled" class="w-full text-left px-4 py-3 text-sm hover:bg-red-50 text-red-600 flex items-center gap-2">
                                                <span class="w-2 h-2 rounded-full bg-red-400"></span> Batalkan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        {{-- Tampilan saat data kosong --}}
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <div class="bg-gray-50 p-4 rounded-full">
                                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                        </svg>
                                    </div>
                                    <div class="text-gray-500">
                                        <p class="font-bold text-lg">Tidak ada transaksi</p>
                                        <p class="text-sm">Belum ada data booking yang masuk untuk saat ini.</p>
                                    </div>
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