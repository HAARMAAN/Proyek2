<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profil Pelanggan') }}
            </h2>
            <a href="{{ route('admin.pelanggan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <div class="flex items-center border-b pb-6 mb-6">
                        <div class="h-20 w-20 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-2xl font-bold">
                            {{ strtoupper(substr($pelanggan->nama_lengkap, 0, 1)) }}
                        </div>
                        <div class="ml-6">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $pelanggan->nama_lengkap }}</h3>
                            <p class="text-sm text-gray-500">Terdaftar sejak: {{ $pelanggan->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase">Email</label>
                            <p class="mt-1 text-lg text-gray-800">{{ $pelanggan->email }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase">WhatsApp</label>
                            <p class="mt-1 text-lg text-gray-800">
                                <a href="https://wa.me/{{ $pelanggan->whatsapp_number }}" target="_blank" class="text-green-600 hover:underline">
                                    {{ $pelanggan->whatsapp_number }}
                                </a>
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase">Alamat</label>
                            <p class="mt-1 text-lg text-gray-800">{{ $pelanggan->alamat }}</p>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-4 bg-gray-50 p-6 rounded-xl">
                        <div class="text-center border-r">
                            <span class="block text-3xl font-bold text-indigo-600">{{ $pelanggan->total_kunjungan ?? 0 }}</span>
                            <span class="text-sm text-gray-500 uppercase tracking-wider">Total Kunjungan</span>
                        </div>
                        <div class="text-center">
                            <span class="block text-3xl font-bold text-yellow-500">{{ $pelanggan->bintang_loyalitas ?? 0 }} ⭐</span>
                            <span class="text-sm text-gray-500 uppercase tracking-wider">Bintang Loyalitas</span>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <a href="{{ route('admin.pelanggan.edit', $pelanggan->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                            Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>