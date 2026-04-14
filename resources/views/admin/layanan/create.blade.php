<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Layanan Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form action="{{ route('admin.layanan.store') }}" method="POST">
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