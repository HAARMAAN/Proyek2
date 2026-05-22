<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Luna Beauty - Admin</title>

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #FDF6F0;
        }

        .font-heading{
            font-family: 'Playfair Display', serif;
        }

        .sidebar-link{
            transition: all 0.25s ease;
            color: #FFF7F1;
            font-weight: 500;
            letter-spacing: 0.2px;
            font-size: 15px;

            padding: 10px 14px;
            border-radius: 14px;
            position: relative;
        }

        .sidebar-link:hover{
            transform: translateX(4px);
            color: #ffffff;

            background: rgba(255,255,255,0.10);
            box-shadow: 0 8px 18px rgba(0,0,0,0.10);
            backdrop-filter: blur(8px);
        }

        .active-menu{
            color: #ffffff;
            font-weight: 600;

            background: rgba(255,255,255,0.14);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
            backdrop-filter: blur(8px);
        }
    </style>
</head>

<body class="antialiased">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside
            class="w-64 fixed inset-y-0 left-0 z-50 flex flex-col px-6 py-6 text-white"
            style="
                background: linear-gradient(180deg, #E1783A 0%, #C95D29 100%);
                box-shadow: 0 10px 30px rgba(217,107,52,0.15);
            ">

            {{-- LOGO --}}
            <div class="mb-7">

                <div class="flex items-center gap-2">

                    {{-- ICON --}}
                    <div class="relative flex-shrink-0">

                        <div class="w-10 h-10 rounded-full border border-white/80 flex items-center justify-center backdrop-blur-sm">

                            <span class="font-heading text-white text-[28px] leading-none">
                                L
                            </span>

                        </div>

                        {{-- AKSEN --}}
                        <div class="absolute -bottom-1 -right-1 text-[10px] text-white/90">
                            ✦
                        </div>

                    </div>

                  {{-- TEXT --}}
<div class="flex flex-col justify-center w-full max-w-[190px]">

    <h1 
        style="
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.05;
            color: white;
            letter-spacing: 0.2px;
            white-space: nowrap;
        ">
        Luna Home Beauty
    </h1>

    <div class="flex items-center gap-5 mt-[7px] w-full">

        <div class="flex-1 h-[1px] bg-white/35"></div>

        <p 
            style="
                font-size: 7px;
                letter-spacing: 0.34em;
                font-weight: 500;
                color: #FFE6D6;
                text-transform: uppercase;
                line-height: 1,05;
                white-space: nowrap;
                flex-shrink: 0;
            ">
            Dashboard Admin
        </p>

        <div class="flex-1 h-[1px] bg-white/35"></div>

    </div>

</div>

                </div>

            </div>

            {{-- MENU --}}
            <nav class="flex-1 flex flex-col gap-4 mt-6">

                <a href="{{ route('dashboard') }}"
                   class="sidebar-link {{ request()->routeIs('dashboard') ? 'active-menu' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.pelanggan.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.pelanggan.*') ? 'active-menu' : '' }}">
                    Data Pelanggan
                </a>

                <a href="{{ route('admin.booking.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.booking.*') ? 'active-menu' : '' }}">
                    Booking Layanan
                </a>

                <a href="{{ route('admin.layanan.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.layanan.*') ? 'active-menu' : '' }}">
                    Manajemen Layanan
                </a>

                <a href="{{ route('admin.laporan.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.laporan.*') ? 'active-menu' : '' }}">
                    Laporan
                </a>

            </nav>

            {{-- LOGOUT --}}
            <div class="pt-4 border-t border-white/20">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="sidebar-link text-[14px] w-full text-left">
                        Logout
                    </button>

                </form>

            </div>

        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 ml-64 min-h-screen p-10"
              style="background-color: #FDF6F0;">

            {{ $slot }}

        </main>

    </div>

</body>

</html>