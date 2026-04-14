<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luna Beauty - Pelanggan</title>
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@500&family=Hanuman:wght@400;700&family=Jost:wght@400&family=Erica+One&family=Metal+Mania&display=swap" rel="stylesheet">
    
    <style>
        body { margin: 0; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        
        .dashboard-container {
            position: relative; width: 1440px; height: 927px;
            background: #FFFFFF; opacity: 0.75; overflow: hidden;
        }

        /* Sidebar Orange */
        .sidebar { position: absolute; width: 500px; height: 927px; left: 0; top: 0; background: rgba(255, 158, 30, 0.81); }
        .logo-placeholder { 
            position: absolute; width: 389px; height: 389px; left: 55px; top: -70px;
            background: url('{{ asset('images/logo_luna.png') }}') no-repeat center; background-size: contain; z-index: 3;
        }

        /* Navigasi */
        .menu-item {
            position: absolute; width: 380px; left: 159px; font-family: 'Hahmlet';
            font-size: 35px; color: #000000; text-decoration: none; transition: 0.3s;
            display: flex; align-items: center;
        }
        .menu-item:hover { color: #ffffff; }
        
        /* Background Aktif (Kotak Oranye Muda) */
        .active-rect { 
            position: absolute; width: 400px; height: 82px; left: -59px; 
            background: #F9CDA2; opacity: 0.9; border-radius: 15px; z-index: -1; 
        }

        /* Typography Global */
        .welcome-text { position: absolute; width: 589px; left: 529px; top: 36px; font-family: 'Hanuman'; font-weight: 700; font-size: 40px; text-align: center; }
        .logout-btn { background: none; border: none; cursor: pointer; padding: 0; text-align: left; }
    </style>
    @stack('styles')
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <div class="logo-placeholder"></div>
            <div style="position: absolute; width: 443px; left: 37px; top: 222px; font-family: 'Hahmlet'; font-size: 25px; text-align: center;">DASHBOARD PELANGGAN</div>
            
            <a href="{{ route('customer.dashboard') }}" class="menu-item" style="top: 315px;">
                @if(Request::is('customer/dashboard')) <div class="active-rect" style="top: -15px;"></div> @endif
                👤 Profil Saya
            </a>

            <a href="{{ route('customer.booking.create') }}" class="menu-item" style="top: 405px;">
                @if(Request::is('customer/booking*')) <div class="active-rect" style="top: -15px;"></div> @endif
                ✨ Booking Sekarang
            </a>

            <a href="{{ route('customer.riwayat') }}" class="menu-item" style="top: 495px;">
                @if(Request::is('customer/riwayat*')) <div class="active-rect" style="top: -15px;"></div> @endif
                📅 Riwayat Booking
            </a>

            <a href="{{ route('customer.loyalitas') }}" class="menu-item" style="top: 585px;">
                @if(Request::is('customer/loyalitas*')) <div class="active-rect" style="top: -15px;"></div> @endif
                ⭐ Bintang Loyalitas
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu-item logout-btn" style="top: 675px;">
                    ↪️ Logout
                </button>
            </form>
        </div>

        @yield('content')
    </div>
</body>
</html>