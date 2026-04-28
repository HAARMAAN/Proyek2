<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Layanan Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="Nama Layanan" />
                            <x-text-input name="layanan_name" type="text" class="w-full" required />
                        </div>
                        <div>
                            <x-input-label value="Deskripsi" />
                            <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label value="Harga (Rp)" />
                                <x-text-input name="price" type="number" class="w-full" required />
                            </div>
                            <div>
                                <x-input-label value="Durasi (Menit)" />
                                <x-text-input name="duration_minutes" type="number" class="w-full" required />
                            </div>
                        </div>
                        <div>
                            <x-input-label value="Foto Layanan" />
                            <input name="image" type="file" accept="image/*" class="w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 transition" />
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                            @error('image')
                                <p class="text-xs text-red-500 mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-input-label value="Kategori" />
                            <select name="category" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="single">Single Treatment</option>
                                <option value="package">Package (Paket)</option>
                            </select>
                        </div>
                        <div class="pt-4">
                            <x-primary-button>Simpan Layanan</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>