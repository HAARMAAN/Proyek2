<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex justify-center items-start min-h-screen">

    <div class="relative bg-white opacity-90 shadow-2xl overflow-hidden" 
         style="width: 1440px; height: 927px;">
        
        <nav class="p-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">MyLogo</div>
            <div>
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded shadow">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <div class="flex flex-col items-center justify-center h-full -mt-20">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4">
                Solusi Booking Layanan Terbaik
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl text-center">
                Kelola pelanggan, layanan, dan booking dengan sistem yang terintegrasi di Laravel 12.
            </p>
            
            <div class="mt-8">
                <a href="#layanan" class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700 transition">
                    Lihat Layanan
                </a>
            </div>
        </div>

    </div>

</body>
</html>