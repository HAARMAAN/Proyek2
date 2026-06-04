<footer class="bg-[#d1743a]">
    <!-- Bagian Atas: Warna Pemisah (Lebih gelap) -->
    <div class="bg-[#ede7dc] py-8 border-b border-[#c55d28]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Logo Bulat -->
                <div class="flex items-center gap-4 mb-6 md:mb-0">
                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-md">
                        <img src="{{ asset('images/LHB.png') }}" alt="logo" class="w-12 h-12 object-contain">
                    </div>
                    <span class="text-2xl font-bold text-[#d1743a]">Luna Home Beauty</span>
                </div>
                <div class="text-[#d1743a] text-lg font-medium italic">
                    #JuaraNyaAtasiMasalahKulit
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Tengah: Menu (Warna dasar footer) -->
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-4 gap-8 text-[#2c2c2c]">
        <div>
            <h3 class="text-xl font-semibold mb-4 text-[#2c2c2c]">Layanan</h3>
            <ul class="space-y-2">
                <li><a href="#service" class="hover:text-[#F2E9DC] transition">Service</a></li>
                <li><a href="#booking" class="hover:text-[#F2E9DC] transition">Booking</a></li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold mb-4 text-[#2c2c2c]">Tentang Luna</h3>
            <ul class="space-y-2">
                <li><a href="#blog" class="hover:text-[#F2E9DC] transition">Blog</a></li>
                <li><a href="#" class="hover:text-[#F2E9DC] transition">Tentang Kami</a></li>
                <li><a href="https://maps.app.goo.gl/6xkb6Rg1sGyBtvXd9" class="hover:text-[#F2E9DC] transition">Lokasi Studio</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4 text-[#2c2c2c]">Kebijakan</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-[#F2E9DC] transition">Syarat & Ketentuan</a></li>
                <li><a href="#" class="hover:text-[#F2E9DC] transition">Kebijakan Privasi</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold text-lg text-[#2c2c2c] mb-4">Hubungi Kami</h3>
            <div class="flex flex-col gap-3">
                <a href="https://www.instagram.com/luna_homebeauty/" class="group flex items-center gap-2 text-[#2c2c2c] transition-colors duration-200">
                    <svg class="w-5 h-5 group-hover:text-[#F2E9DC] transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    <span class="group-hover:text-[#F2E9DC] transition-colors text-sm font-medium">Instagram</span>
                </a>
                <a href="https://www.facebook.com/lunahomebeauty/" target="_blank" class="group flex items-center gap-2 text-[#2c2c2c] transition-colors duration-200">
                    <svg class="w-6 h-6 group-hover:text-[#F2E9DC] transition-colors" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    <span class="group-hover:text-[#F2E9DC] transition-colors text-sm font-medium">Facebook</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Bagian Bawah: Copyright -->
    <div class="py-6 border-t border-[#2c2c2c] text-center text-sm text-[#2c2c2c]">
        © {{ date('Y') }} Luna Home Beauty
    </div>
</footer>