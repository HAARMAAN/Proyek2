<x-app-layout>
    <div class="flex min-h-screen bg-[#FDF8F4]">
        <div class="flex-1 p-8">
            <div class="mb-8">
                <h1 class="text-4xl font-serif font-bold text-[#634832]">Data Pelanggan</h1>
                <p class="text-[#8B6D51] mt-1 text-lg">Kelola data pelanggan Luna Home Beauty</p>
            </div>

            <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-white border-b border-gray-50">
                                <th class="p-6 font-bold text-gray-700">Nama Pelanggan</th>
                                <th class="p-6 font-bold text-gray-700">Nomor WhatsApp</th>
                                <th class="p-6 font-bold text-gray-700 text-center">Jumlah Treatment</th>
                                <th class="p-6 font-bold text-gray-700 text-center">Bintang Loyalitas</th>
                                <th class="p-6 font-bold text-gray-700 text-center">Status</th>
                                <th class="p-6 font-bold text-gray-700 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($pelanggan as $item)
                            <tr class="hover:bg-[#FDF8F4]/50 transition-colors text-sm">
                                <td class="p-6 text-gray-800 font-medium">{{ $item->name }}</td>
                                <td class="p-6 text-green-600 font-bold text-center">{{ $item->whatsapp_number ?? '-' }}</td>
                                <td class="p-6 text-center font-semibold text-gray-600">{{ $item->bookings_count }}</td>
                                <td class="p-6 text-center">
                                    <div class="inline-flex items-center bg-yellow-50 px-3 py-1 rounded-full">
                                        <span class="text-yellow-500 mr-1">⭐</span>
                                        <span class="font-bold text-yellow-700">{{ $item->bintang_loyalitas ?? 0 }}</span>
                                    </div>
                                </td>
                                <td class="p-6 text-center">
                                    @if($item->bookings_count >= 10)
                                        <span class="px-4 py-1.5 bg-orange-500 text-white text-[10px] font-black rounded-full shadow-sm">VIP</span>
                                    @else
                                        <span class="px-4 py-1.5 bg-[#E8D8C4] text-[#634832] text-[10px] font-black rounded-full uppercase">Member</span>
                                    @endif
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center justify-center gap-4">
                                        <button type="button" onclick="showDetail({{ $item->id }})" class="text-[#D4813D] font-bold hover:underline">Detail</button>
                                        <button type="button" onclick="openEditModal({{ $item->id }})" class="text-indigo-600 font-bold hover:underline">Edit</button>
                                        <form action="{{ route('admin.pelanggan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus pelanggan?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 font-bold hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="p-12 text-center text-gray-400 italic">Belum ada data pelanggan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ open: false, user: {} }" @open-modal-detail.window="open = true; user = $event.detail" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center overflow-hidden" style="display: none;">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="open = false"></div>
        <div class="bg-white rounded-[32px] w-full max-w-md p-8 relative z-10 shadow-2xl">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-2xl font-serif font-bold text-[#634832]">Detail Pelanggan</h3>
                    <p class="text-[#8B6D51] text-sm">Informasi lengkap profil member</p>
                </div>
                <button @click="open = false" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
            </div>
            <div class="space-y-5">
                <div class="p-4 bg-[#FDF8F4] rounded-2xl">
                    <p class="text-[10px] uppercase tracking-widest text-[#8B6D51] font-bold mb-1">Nama Lengkap</p>
                    <p class="text-[#634832] font-semibold text-lg" x-text="user.name"></p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 border border-gray-100 rounded-2xl"><p class="text-[10px] uppercase font-bold text-gray-400">Email</p><p class="text-gray-700 text-sm truncate" x-text="user.email"></p></div>
                    <div class="p-4 border border-gray-100 rounded-2xl"><p class="text-[10px] uppercase font-bold text-gray-400">WhatsApp</p><p class="text-green-600 font-bold text-sm" x-text="user.whatsapp"></p></div>
                </div>
                <div class="p-4 border border-gray-100 rounded-2xl flex justify-between items-center">
                    <div><p class="text-[10px] uppercase font-bold text-gray-400">Status Loyalitas</p><p class="font-bold text-[#634832]" x-text="user.loyalitas + ' Bintang'"></p></div>
                    <div class="text-right"><p class="text-[10px] uppercase font-bold text-gray-400 text-xs">Bergabung</p><p class="text-gray-600 text-xs font-medium" x-text="user.created_at"></p></div>
                </div>
            </div>
            <button @click="open = false" class="w-full mt-8 bg-[#D4813D] text-white font-bold py-4 rounded-2xl shadow-lg">Tutup Detail</button>
        </div>
    </div>

    <div x-data="{ openEdit: false, user: {} }" @open-modal-edit.window="openEdit = true; user = $event.detail" x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center overflow-hidden" style="display: none;">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="openEdit = false"></div>
        <form :action="'/admin/pelanggan/' + user.id" method="POST" class="bg-white rounded-[32px] w-full max-w-md p-8 relative z-10 shadow-2xl">
            @csrf @method('PUT')
            <h3 class="text-2xl font-serif font-bold text-[#634832] mb-6">Edit Pelanggan</h3>
            <div class="space-y-4 text-left">
                <div>
                    <label class="text-[10px] uppercase font-bold text-[#8B6D51] ml-2">Nama Lengkap</label>
                    <input type="text" name="name" :value="user.name" class="w-full mt-1 px-5 py-3 rounded-2xl border-gray-100 bg-[#FDF8F4] text-[#634832] font-semibold">
                </div>
                <div>
                    <label class="text-[10px] uppercase font-bold text-[#8B6D51] ml-2">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" :value="user.whatsapp" class="w-full mt-1 px-5 py-3 rounded-2xl border-gray-100 bg-[#FDF8F4] text-green-600 font-bold">
                </div>
                <div>
                    <label class="text-[10px] uppercase font-bold text-[#8B6D51] ml-2">Bintang Loyalitas</label>
                    <input type="number" name="bintang_loyalitas" :value="user.loyalitas" class="w-full mt-1 px-5 py-3 rounded-2xl border-gray-100 bg-[#FDF8F4] text-yellow-600 font-bold">
                </div>
            </div>
            <div class="flex gap-3 mt-8">
                <button type="button" @click="openEdit = false" class="flex-1 py-4 text-gray-400 font-bold">Batal</button>
                <button type="submit" class="flex-[2] bg-[#D4813D] text-white font-bold py-4 rounded-2xl">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        function showDetail(id) {
            fetch(`/admin/pelanggan/${id}`).then(res => res.json()).then(data => {
                window.dispatchEvent(new CustomEvent('open-modal-detail', { detail: data }));
            });
        }
        function openEditModal(id) {
            fetch(`/admin/pelanggan/${id}`).then(res => res.json()).then(data => {
                window.dispatchEvent(new CustomEvent('open-modal-edit', { detail: data }));
            });
        }
    </script>
</x-app-layout>