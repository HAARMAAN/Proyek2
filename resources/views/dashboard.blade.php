<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Luna Home Beauty') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-orange-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Pelanggan Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalPelanggan }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-400">
                    <p class="text-sm font-medium text-gray-500 uppercase">Booking Menunggu Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $bookingMenunggu }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Treatment Selesai Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalBookingSelesai }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-indigo-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Layanan Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalLayanan }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-gray-900 font-bold border-b border-gray-100">
                    Booking Terbaru
                </div>
                <div class="p-6">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-gray-400 text-sm uppercase">
                                <th class="pb-4">Pelanggan</th>
                                <th class="pb-4">Layanan</th>
                                <th class="pb-4">Status</th>
                                <th class="pb-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($bookingTerbaru as $bt)
                            <tr>
                                <td class="py-4">{{ $bt->pelanggan->nama_lengkap }}</td>
                                <td class="py-4 text-gray-600 text-sm">{{ $bt->layanan->layanan_name }}</td>
                                <td class="py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-bold {{ $bt->status_booking == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ strtoupper($bt->status_booking) }}
                                    </span>
                                </td>
                                <td class="py-4 text-right">
                                    <a href="{{ route('admin.booking.index', $bt->id) }}" class="text-indigo-600 hover:underline font-medium">Cek Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>