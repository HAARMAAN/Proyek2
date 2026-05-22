<x-app-layout>

    {{-- IMPORT FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <div class="max-w-7xl mx-auto"
         style="font-family: 'Poppins', sans-serif;">

        {{-- HEADER --}}
        <div class="flex justify-between items-end mb-10">

            <div>

                <h1 class="text-4xl font-bold"
                    style="font-family: 'Playfair Display', serif; color: #4E3629;">

                    Manajemen Layanan

                </h1>

                <p class="mt-2 text-lg"
                   style="color: #7A5C48;">

                    Kelola daftar layanan kecantikan Anda

                </p>

            </div>

            <a href="{{ route('admin.layanan.create') }}"
               class="text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all transform hover:scale-105 active:scale-95 text-sm"
               style="background-color: #D96B34;">

                + Tambah Layanan Baru

            </a>

        </div>

        {{-- TABLE CARD --}}
        <div class="bg-white rounded-[2rem] border border-[#F3E3D7] p-8 overflow-hidden"
             style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

            <table class="w-full text-left border-collapse">

                {{-- TABLE HEAD --}}
                <thead>

                    <tr class="border-b border-[#F3E3D7] text-sm font-semibold"
                        style="color: #4E3629;">

                        <th class="pb-6 px-4">Nama Layanan</th>
                        <th class="pb-6 px-4">Kategori</th>
                        <th class="pb-6 px-4">Harga</th>
                        <th class="pb-6 px-4">Durasi</th>
                        <th class="pb-6 px-4 text-right">Aksi</th>

                    </tr>

                </thead>

                {{-- TABLE BODY --}}
                <tbody class="divide-y divide-[#F8ECE3]"
                       style="font-family: 'Poppins', sans-serif;">

                    @foreach($layanan as $item)

                    <tr class="hover:bg-[#FFF7F1] transition-colors group">

                        {{-- NAMA --}}
                        <td class="py-6 px-4">

                            <span class="font-semibold text-sm leading-tight"
                                  style="color: #4E3629;">

                                {{ $item->layanan_name }}

                            </span>

                        </td>

                        {{-- KATEGORI --}}
                        <td class="py-6 px-4">

                            <span class="px-4 py-2 rounded-full text-[11px] font-semibold"
                                  style="background-color: #FFF1E8; color: #D96B34;">

                                {{ $item->category }}

                            </span>

                        </td>

                        {{-- HARGA --}}
                        <td class="py-6 px-4">

                            <span class="font-semibold text-sm"
                                  style="color: #D96B34;">

                                Rp {{ number_format($item->price, 0, ',', '.') }}

                            </span>

                        </td>

                        {{-- DURASI --}}
                        <td class="py-6 px-4 text-sm font-medium"
                            style="color: #7A5C48;">

                            {{ $item->duration_minutes }} Menit

                        </td>

                        {{-- AKSI --}}
                        <td class="py-6 px-4 text-right">

                            <div class="flex justify-end gap-6 text-sm">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.layanan.edit', $item->id) }}"
                                   class="font-semibold hover:underline underline-offset-4 transition"
                                   style="color: #D96B34;">

                                    Edit

                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.layanan.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="font-semibold transition hover:underline"
                                            style="color: #E10303;">

                                        Hapus

                                    </button>

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