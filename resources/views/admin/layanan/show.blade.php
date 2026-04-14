<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Layanan: {{ $layanan->layanan_name }}
            </h2>
            <a href="{{ route('admin.layanan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-xs">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="px-3 py-1 {{ $layanan->category == 'package' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }} rounded-full text-xs font-bold uppercase">
                            {{ $layanan->category }}
                        </span>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $layanan->layanan_name }}</h3>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 uppercase">Harga Treatment</p>
                        <p class="text-2xl font-bold text-green-600">Rp {{ number_format($layanan->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-b py-6 mb-6">
                    <div>
                        <h4 class="text-sm font-semibold text-gray-500 uppercase mb-1">Durasi Estimasi</h4>
                        <p class="text-lg text-gray-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $layanan->duration_minutes }} Menit
                        </p>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-500 uppercase mb-1">ID Layanan</h4>
                        <p class="text-lg text-gray-800">#SRVC-{{ str_pad($layanan->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase mb-2">Deskripsi Layanan</h4>
                    <p class="text-gray-700 leading-relaxed italic">
                        {{ $layanan->description ?? 'Tidak ada deskripsi untuk layanan ini.' }}
                    </p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md text-sm font-bold shadow-sm transition">
                        Edit Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>