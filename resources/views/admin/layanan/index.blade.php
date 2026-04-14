<x-app-layout>
    <div class="max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-end mb-10">
            <div>
                <h1 class="text-4xl font-serif text-[#4A3427] font-semibold">Manajemen Layanan</h1>
                <p class="text-gray-500 mt-2 text-lg">Kelola daftar layanan kecantikan Anda</p>
            </div>
            <a href="{{ route('admin.layanan.create') }}" 
               class="bg-[#D9773D] hover:bg-[#BF642F] text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all transform hover:scale-105 active:scale-95 text-sm uppercase"> + Tambah Layanan Baru</a>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 text-gray-400 text-xs uppercase tracking-widest">
                        <th class="pb-6 px-4">Nama Layanan</th>
                        <th class="pb-6 px-4">Kategori</th>
                        <th class="pb-6 px-4">Harga</th>
                        <th class="pb-6 px-4">Durasi</th>
                        <th class="pb-6 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($layanan as $item)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="py-6 px-4">
                            <span class="text-gray-800 font-bold text-lg leading-tight">{{ $item->layanan_name }}</span>
                        </td>
                        <td class="py-6 px-4">
                            <span class="px-4 py-1.5 bg-orange-50 text-[#D9773D] rounded-full text-[10px] font-bold uppercase tracking-wider">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td class="py-6 px-4">
                            <span class="font-bold text-[#D9773D] text-lg">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </td>
                        <td class="py-6 px-4 text-gray-400 font-medium">
                            {{ $item->duration_minutes }} Menit
                        </td>
                        <td class="py-6 px-4 text-right">
                            <div class="flex justify-end gap-6 font-bold text-sm">
                                <a href="{{ route('admin.layanan.edit', $item->id) }}" class="text-[#D9773D] hover:underline underline-offset-4 decoration-2">Edit</a>
                                <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-300 hover:text-red-500 transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>