<x-app-layout>

    {{-- IMPORT FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <x-slot name="header">

        <h2 class="text-3xl font-bold"
            style="font-family: 'Playfair Display', serif; color: #4E3629;">

            Tambah Layanan Baru

        </h2>

    </x-slot>

    <div class="py-12"
         style="font-family: 'Poppins', sans-serif;">

        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-8 rounded-[30px] border border-[#F3E3D7]"
                 style="box-shadow: 0 10px 30px rgba(217,107,52,0.08);">

                <form action="{{ route('admin.layanan.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="space-y-5">

                        {{-- NAMA LAYANAN --}}
                        <div>

                            <label class="text-[13px] font-semibold"
                                   style="color: #4E3629;">

                                Nama Layanan

                            </label>

                            <input type="text"
                                   name="layanan_name"
                                   required
                                   class="w-full mt-2 px-4 py-2.5 rounded-xl
                                          border border-[#D96B34]
                                          bg-[#FFF7F1]
                                          text-sm
                                          focus:ring-0 focus:border-[#D96B34]"
                                   style="color: #4E3629;">

                        </div>

                        {{-- DESKRIPSI --}}
                        <div>

                            <label class="text-[13px] font-semibold"
                                   style="color: #4E3629;">

                                Deskripsi

                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="w-full mt-2 px-4 py-2.5 rounded-xl
                                             border border-[#D96B34]
                                             bg-[#FFF7F1]
                                             text-sm
                                             focus:ring-0 focus:border-[#D96B34]"
                                      style="color: #4E3629;"></textarea>

                        </div>

                        {{-- HARGA & DURASI --}}
                        <div class="grid grid-cols-2 gap-4">

                            {{-- HARGA --}}
                            <div>

                                <label class="text-[13px] font-semibold"
                                       style="color: #4E3629;">

                                    Harga (Rp)

                                </label>

                                <input type="number"
                                       name="price"
                                       required
                                       class="w-full mt-2 px-4 py-2.5 rounded-xl
                                              border border-[#D96B34]
                                              bg-[#FFF7F1]
                                              text-sm
                                              focus:ring-0 focus:border-[#D96B34]"
                                       style="color: #4E3629;">

                            </div>

                            {{-- DURASI --}}
                            <div>

                                <label class="text-[13px] font-semibold"
                                       style="color: #4E3629;">

                                    Durasi (Menit)

                                </label>

                                <input type="number"
                                       name="duration_minutes"
                                       required
                                       class="w-full mt-2 px-4 py-2.5 rounded-xl
                                              border border-[#D96B34]
                                              bg-[#FFF7F1]
                                              text-sm
                                              focus:ring-0 focus:border-[#D96B34]"
                                       style="color: #4E3629;">

                            </div>

                        </div>

                        {{-- FOTO --}}
                        <div>

                            <label class="text-[13px] font-semibold"
                                   style="color: #4E3629;">

                                Foto Layanan

                            </label>

                            <input name="image"
                                   type="file"
                                   accept="image/*"
                                   class="w-full mt-3 text-sm
                                          file:mr-4
                                          file:py-3
                                          file:px-5
                                          file:rounded-full
                                          file:border-0
                                          file:font-semibold
                                          file:text-white
                                          hover:file:opacity-90
                                          transition"
                                   style="color: #7A5C48;
                                          file-background-color: #D96B34;">

                            <p class="text-[10px] mt-2 italic"
                               style="color: #B98A68;">

                                *Format: JPG, PNG, WEBP (Maks. 2MB)

                            </p>

                            @error('image')

                                <p class="text-xs mt-2 font-semibold"
                                   style="color: #E10303;">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        {{-- KATEGORI --}}
                        <div>

                            <label class="text-[13px] font-semibold"
                                   style="color: #4E3629;">

                                Kategori

                            </label>

                            <select name="category"
                                    class="w-full mt-2 px-4 py-2.5 rounded-xl
                                           border border-[#D96B34]
                                           bg-[#FFF7F1]
                                           text-sm
                                           focus:ring-0 focus:border-[#D96B34]"
                                    style="color: #4E3629;">

                                <option value="single">
                                    Single Treatment
                                </option>

                                <option value="package">
                                    Package (Paket)
                                </option>

                            </select>

                        </div>

                        {{-- BUTTON --}}
                        <div class="pt-4">

                            <button type="submit"
                                    class="w-full py-3 rounded-2xl
                                           text-white font-semibold
                                           shadow-md transition hover:scale-[1.01]"
                                    style="background-color: #D96B34;">

                                Simpan Layanan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>