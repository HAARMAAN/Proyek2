<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pelanggan: {{ $pelanggan->nama_lengkap }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <x-input-label for="nama_lengkap" value="Nama Lengkap" />
                            <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full" :value="old('nama_lengkap', $pelanggan->nama_lengkap)" required />
                        </div>

                        <div>
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $pelanggan->email)" required />
                        </div>

                        <div>
                            <x-input-label for="whatsapp_number" value="Nomor WhatsApp" />
                            <x-text-input id="whatsapp_number" name="whatsapp_number" type="text" class="mt-1 block w-full" :value="old('whatsapp_number', $pelanggan->whatsapp_number)" required />
                        </div>

                        <div>
                            <x-input-label for="alamat" value="Alamat" />
                            <textarea id="alamat" name="alamat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="total_kunjungan" value="Total Kunjungan" />
                                <x-text-input id="total_kunjungan" name="total_kunjungan" type="number" class="mt-1 block w-full" :value="old('total_kunjungan', $pelanggan->total_kunjungan)" />
                            </div>
                            <div>
                                <x-input-label for="bintang_loyalitas" value="Bintang Loyalitas" />
                                <x-text-input id="bintang_loyalitas" name="bintang_loyalitas" type="number" class="mt-1 block w-full" :value="old('bintang_loyalitas', $pelanggan->bintang_loyalitas)" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button>Simpan Perubahan</x-primary-button>
                            <a href="{{ route('admin.pelanggan.index') }}" class="text-gray-600 hover:underline">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>