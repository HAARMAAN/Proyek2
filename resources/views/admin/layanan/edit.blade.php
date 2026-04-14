<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Layanan: {{ $layanan->layanan_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input-label for="layanan_name" value="Nama Layanan" />
                            <x-text-input id="layanan_name" name="layanan_name" type="text" class="mt-1 block w-full" :value="old('layanan_name', $layanan->layanan_name)" required />
                        </div>

                        <div>
                            <x-input-label for="category" value="Kategori" />
                            <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="single" {{ $layanan->category == 'single' ? 'selected' : '' }}>Single Treatment</option>
                                <option value="package" {{ $layanan->category == 'package' ? 'selected' : '' }}>Package (Paket)</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="price" value="Harga (Rp)" />
                                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $layanan->price)" required />
                            </div>
                            <div>
                                <x-input-label for="duration_minutes" value="Durasi (Menit)" />
                                <x-text-input id="duration_minutes" name="duration_minutes" type="number" class="mt-1 block w-full" :value="old('duration_minutes', $layanan->duration_minutes)" required />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="description" value="Deskripsi" />
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $layanan->description) }}</textarea>
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>Update Layanan</x-primary-button>
                            <a href="{{ route('admin.layanan.index') }}" class="text-gray-600 hover:underline text-sm">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>