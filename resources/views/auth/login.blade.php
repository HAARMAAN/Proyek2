<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Kata Sandi" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Lupa Password -->
        <div class="mt-4 text-right">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-[#d96b34]" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            @endif
        </div>

        <!-- Button Login -->
        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                Masuk
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <div class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-[#d96b34] hover:underline font-medium">
                Daftar
            </a>
        </div>

    </form>
</x-guest-layout>