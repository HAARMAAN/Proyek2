<x-app-layout>

    {{-- IMPORT FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <div class="flex min-h-screen bg-[#FDF6F0]" style="font-family: 'Poppins', sans-serif;">

        <div class="flex-1 p-8">

            {{-- HEADER --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold"
    style="font-family: 'Playfair Display', serif; color: #4E3629;">
    Data Pelanggan
</h1>

                <p class="mt-2 text-base"
   style="color: #7A5C48;">
    Kelola data pelanggan Luna Home Beauty
</p>
            </div>

            {{-- TABLE --}}
            <div class="bg-white rounded-[30px] overflow-hidden border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        {{-- HEAD --}}
                        <thead>
                            <tr class="bg-[#FFF8F3] border-b border-[#F3E3D7]">

                        
<th class="p-6 text-[#5A3E2B] text-sm font-semibold"> 
                                    Nama Pelanggan
                                </th>

                                <th class="p-6 text-[#5A3E2B] text-sm font-semibold">
                                    Nomor WhatsApp
                                </th>

                                <th class="p-6 text-[#5A3E2B] text-sm font-semibold text-center">
                                    Jumlah Treatment
                                </th>

                                <th class="p-6 text-[#5A3E2B] text-sm font-semibold text-center">
                                    Bintang Loyalitas
                                </th>

                                <th class="p-6 text-[#5A3E2B] text-sm font-semibold text-center">
                                    Status
                                </th>

                                <th class="p-6 text-[#5A3E2B] text-sm font-semibold text-center">
                                    Aksi
                                </th>

</th>
                            </tr>
                        </thead>

                        {{-- BODY --}}
                        <tbody class="divide-y divide-[#F8ECE3]">

                            @forelse($pelanggan as $item)

                            <tr class="hover:bg-[#FFF7F1] transition duration-300 text-sm">

                                {{-- NAMA --}}
                                <td class="p-6">
                                    <div class="font-semibold text-[#5A3E2B]">
                                        {{ $item->name }}
                                    </div>
                                </td>

                                {{-- WA --}}
                                <td class="p-6 text-center">
                                    <span class="text-[#D96B34] font-semibold">
                                        {{ $item->whatsapp_number ?? '-' }}
                                    </span>
                                </td>

                                {{-- TOTAL --}}
                                <td class="p-6 text-center font-medium text-[#7A5C48]">
                                    {{ $item->bookings_count }}
                                </td>

                                {{-- LOYALITAS --}}
                                <td class="p-6 text-center">

                                    <div class="inline-flex items-center gap-1
                                                bg-[#FFF1E8]
                                                px-4 py-2 rounded-full">

                                        <span>⭐</span>

                                        <span class="font-semibold text-[#D96B34]">
                                            {{ $item->bintang_loyalitas ?? 0 }}
                                        </span>

                                    </div>

                                </td>

                                {{-- STATUS --}}
                                <td class="p-6 text-center">

                                    @if($item->bookings_count >= 10)

                                        <span class="px-4 py-2
                                                     bg-gradient-to-r
                                                     from-[#D96B34]
                                                     to-[#F2A16B]
                                                     text-white
                                                     text-[11px]
                                                     font-semibold
                                                     rounded-full shadow-sm">
                                            VIP
                                        </span>

                                    @else

                                        <span class="px-4 py-2
                                                     bg-[#FDF1E7]
                                                     text-[#B06A3F]
                                                     text-[11px]
                                                     font-semibold
                                                     rounded-full">
                                            Member
                                        </span>

                                    @endif

                                </td>

                                {{-- AKSI --}}
                                <td class="p-6">

                                    <div class="flex items-center justify-center gap-5">

                                        {{-- DETAIL --}}
                                       <button
    type="button"
    onclick="showDetail({{ $item->id }})"
    style="color: #D96B34;"
    class="font-semibold hover:underline transition">
    Detail
</button>

                                        {{-- EDIT --}}
                                       <button
    type="button"
    onclick="openEditModal({{ $item->id }})"
    style="color: #D96B34;"
    class="font-semibold hover:underline transition">
    Edit
</button>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('admin.pelanggan.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus pelanggan?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
    style="color: #e10303;"
    class="font-semibold hover:underline transition">
    Hapus
</button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="6"
                                    class="p-12 text-center text-[#B89B84] italic">
                                    Belum ada data pelanggan.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>



    {{-- MODAL DETAIL --}}
    <div x-data="{ open: false, user: {} }"
     @open-modal-detail.window="open = true; user = $event.detail"
     x-show="open"
     class="fixed inset-0 z-50 flex items-center justify-center overflow-hidden"
     style="display: none; font-family: 'Poppins', sans-serif;">

    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm"
         @click="open = false"></div>

    <div class="bg-white rounded-[30px]
                w-full max-w-md p-8 relative z-10
                border border-[#F3E3D7]"
         style="box-shadow: 0 15px 40px rgba(217,107,52,0.15);">

        <div class="flex justify-between items-start mb-6">

            <div>
                <h3 class="text-3xl text-[#5A3E2B] font-bold"
                    style="font-family: 'Playfair Display', serif;">
                    Detail Pelanggan
                </h3>

                <p class="text-[#9A7B65] text-sm mt-1">
                    Informasi lengkap profil member
                </p>
            </div>

            <button @click="open = false"
                    class="text-[#C8A58B] hover:text-[#5A3E2B] text-2xl">
                &times;
            </button>

        </div>

        <div class="space-y-4">

            <div class="bg-[#FFF7F1] p-5 rounded-2xl">
                <p class="text-[11px] tracking-wide text-[#B98A68] font-semibold mb-2">
                    Nama Lengkap
                </p>

                <p class="text-[#5A3E2B] font-semibold text-lg"
                   x-text="user.name"></p>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div class="border border-[#F3E3D7] p-4 rounded-2xl">
                    <p class="text-[10px] font-semibold text-[#B98A68] mb-1">
                        Email
                    </p>

                    <p class="text-[#5A3E2B] text-sm truncate"
                       x-text="user.email"></p>
                </div>

                <div class="border border-[#F3E3D7] p-4 rounded-2xl">
                    <p class="text-[10px] font-semibold text-[#B98A68] mb-1">
                        WhatsApp
                    </p>

                    <p class="text-[#D96B34] font-semibold text-sm"
                       x-text="user.whatsapp"></p>
                </div>

            </div>

            <div class="border border-[#F3E3D7]
                        p-4 rounded-2xl
                        flex justify-between items-center">

                <div>
                    <p class="text-[10px] font-semibold text-[#B98A68]">
                        Loyalitas
                    </p>

                    <p class="font-semibold text-[#5A3E2B]"
                       x-text="user.loyalitas + ' Bintang'"></p>
                </div>

                <div class="text-right">
                    <p class="text-[10px] font-semibold text-[#B98A68]">
                        Bergabung
                    </p>

                    <p class="text-[#7A5C48] text-xs"
                       x-text="user.created_at"></p>
                </div>

            </div>
 <button @click="open = false"
    class="w-full mt-8
           text-white font-semibold
           py-4 rounded-2xl
           shadow-md hover:scale-[1.01]
           transition"
    style="background-color: #D96B34;">
    Tutup Detail
</button>

        </div>

    </div>
        </div>
    </div>
</div> 

           



    {{-- MODAL EDIT --}}
   <div x-data="{ openEdit: false, user: {} }"
     @open-modal-edit.window="openEdit = true; user = $event.detail"
     x-show="openEdit"
     class="fixed inset-0 z-50 flex items-center justify-center overflow-hidden"
     style="display: none; font-family: 'Poppins', sans-serif;">

    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm"
         @click="openEdit = false"></div>

    <form :action="'/admin/pelanggan/' + user.id"
          method="POST"
          class="bg-white rounded-[30px]
                 w-full max-w-md p-8 relative z-10
                 border border-[#F3E3D7]"
          style="box-shadow: 0 15px 40px rgba(232, 94, 26, 0.15);">

        @csrf
        @method('PUT')

        <h3 class="text-3xl font-bold text-[#5A3E2B] mb-6"
            style="font-family: 'Playfair Display', serif;">
            Edit Pelanggan
        </h3>

        <div class="space-y-4">

            <div>
                <label class="text-[11px] font-semibold text-[#B98A68] ml-2">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       :value="user.name"
                       class="w-full mt-2 px-5 py-3 rounded-2xl
                              border border-[#F3E3D7]
                              bg-[#FFF7F1]
                              text-[#5A3E2B]
                              focus:ring-0 focus:border-[#D96B34]">
            </div>

            <div>
                <label class="text-[11px] font-semibold text-[#B98A68] ml-2">
                    Nomor WhatsApp
                </label>

                <input type="text"
                       name="whatsapp_number"
                       :value="user.whatsapp"
                       class="w-full mt-2 px-5 py-3 rounded-2xl
                              border border-[#F3E3D7]
                              bg-[#FFF7F1]
                              text-[#D96B34]
                              focus:ring-0 focus:border-[#D96B34]">
            </div>

            <div>
                <label class="text-[11px] font-semibold text-[#B98A68] ml-2">
                    Bintang Loyalitas
                </label>

                <input type="number"
                       name="bintang_loyalitas"
                       :value="user.loyalitas"
                       class="w-full mt-2 px-5 py-3 rounded-2xl
                              border border-[#F3E3D7]
                              bg-[#FFF7F1]
                              text-[#D96B34]
                              focus:ring-0 focus:border-[#D96B34]">
            </div>

        </div>

            <div class="flex gap-3 mt-8">

               <button type="button"
    @click="openEdit = false"
    class="flex-1 py-4 rounded-2xl
           text-white font-semibold shadow-sm transition"
    style="background-color: #D96B34;">
    Batal
</button>

                <button type="submit"
    class="flex-[2] py-4 rounded-2xl
           text-white font-semibold shadow-md transition"
    style="background-color: #D96B34;">
    Simpan
</button>

            </div>

        </form>

    </div>



    <script>
        function showDetail(id) {
            fetch(`/admin/pelanggan/${id}`)
                .then(res => res.json())
                .then(data => {
                    window.dispatchEvent(
                        new CustomEvent('open-modal-detail', {
                            detail: data
                        })
                    );
                });
        }

        function openEditModal(id) {
            fetch(`/admin/pelanggan/${id}`)
                .then(res => res.json())
                .then(data => {
                    window.dispatchEvent(
                        new CustomEvent('open-modal-edit', {
                            detail: data
                        })
                    );
                });
        }
    </script>

</x-app-layout>