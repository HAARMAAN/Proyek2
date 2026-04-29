<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Nomor WhatsApp -->
        <div class="mt-4">
            <x-input-label for="whatsapp_number" value="Nomor WhatsApp" />
            <x-text-input id="whatsapp_number" class="block mt-1 w-full" type="text" name="whatsapp_number" :value="old('whatsapp_number')" required />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" value="Alamat Lengkap" />
            <textarea id="alamat" name="alamat" class="block mt-1 w-full border-gray-300 focus:border-[#d96b34] focus:ring-[#d96b34] rounded-md shadow-sm">{{ old('alamat') }}</textarea>
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Kata Sandi -->
        <div class="mt-4">
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tombol -->
        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                Daftar
            </x-primary-button>
        </div>

        <!-- Link Login -->
        <div class="mt-4 text-center text-sm text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-[#d96b34] hover:underline font-medium">
                Masuk
            </a>
        </div>

    </form>
</x-guest-layout>