<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luna Beauty - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Hahmlet:wght@500&family=Hanuman:wght@400;700&family=Jost:wght@400&family=Erica+One&family=Metal+Mania&display=swap" rel="stylesheet">
    
    <style>
    body { margin: 0; background-color: #f8f8f8; font-family: 'Jost', sans-serif; }

    /* NAVBAR UTAMA (Gaya ZAP/WhatsApp Referensi) */
    .navbar-luna {
        position: sticky; top: 0; width: 100%; height: 90px;
        background-color: #F9CDA2; /* Oranye Muda sesuai gambar */
        display: flex; align-items: center; justify-content: space-between;
        padding: 0 60px; box-sizing: border-box; z-index: 1000;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    /* Logo Kiri */
    .brand-section { display: flex; align-items: center; gap: 15px; }
    .brand-logo { height: 70px; width: auto; object-fit: contain; }
    .brand-text { font-family: 'Hahmlet'; font-weight: 700; font-size: 18px; color: #333; }

    /* Menu Kanan */
    .nav-menu-wrapper { display: flex; align-items: center; gap: 35px; }

    .nav-link-item {
        text-decoration: none; color: #333; font-family: 'Jost';
        font-size: 18px; font-weight: 500; display: flex; align-items: center;
        gap: 8px; transition: 0.3s;
    }

    .nav-link-item:hover { color: #888; }
    
    /* Penanda Menu Aktif (Garis Bawah Tipis) */
    .nav-link-item.active { border-bottom: 2px solid #333; padding-bottom: 4px; }

    .profile-icon { font-size: 28px; color: #333; margin-left: 10px; }

    .logout-button { background: none; border: none; cursor: pointer; font-size: 18px; display: flex; align-items: center; gap: 8px; }

    /* Area Konten */
    .content-container { padding: 40px 10%; min-height: 100vh; }
</style>

<body>
    <header class="navbar-luna">
        <div class="brand-section">
            <img src="{{ asset('images/LHB.png') }}" alt="Luna Logo" class="brand-logo">
            <div class="brand-text">LUNA HOME BEAUTY</div>
        </div>

       <nav class="nav-menu-wrapper">
    <a href="{{ route('customer.booking.index') }}" class="nav-link-item {{ Request::is('customer.booking.index') ? 'active' : '' }}">
        📋 Booking
    </a>

    <a href="{{ route('customer.riwayat') }}" class="nav-link-item {{ Request::is('customer/riwayat*') ? 'active' : '' }}">
        📅 Riwayat Booking
    </a>

    <a href="{{ route('customer.loyalitas') }}" class="nav-link-item {{ Request::is('customer/loyalitas*') ? 'active' : '' }}">
        ⭐ Loyalitas
    </a>

    <div class="profile-dropdown" style="position: relative; display: inline-block;">
        <button onclick="toggleDropdown()" class="profile-trigger" style="background: none; border: none; cursor: pointer; font-size: 28px; padding: 0; margin-left: 10px;">
            👤
        </button>
        
        <div id="myDropdown" class="dropdown-content" style="display: none; position: absolute; right: 0; background-color: #ffffff; min-width: 160px; box-shadow: 0px 8px 16px rgba(0,0,0,0.2); border-radius: 12px; z-index: 1; overflow: hidden; margin-top: 10px; border: 1px solid #ddd;">
            
            <a href="{{ route('customer.dashboard') }}" style="color: black; padding: 12px 16px; text-decoration: none; display: block; font-family: 'Jost'; font-size: 16px; transition: 0.3s;">
                👤 Profil Saya
            </a>
            
            <hr style="margin: 0; border: 0; border-top: 1px solid #eee;">
            
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 16px; cursor: pointer; font-family: 'Jost'; font-size: 16px; color: #d9534f; transition: 0.3s;">
                    ↪️ Logout
                </button>
            </form>
        </div>
    </div>
</nav>
    </header>

    <main class="content-container">
        @yield('content')
    </main>

<script>
    /* Fungsi buat munculin/nyembunyiin dropdown */
    function toggleDropdown() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Nutup dropdown kalau user ngeklik di luar area dropdown
    window.onclick = function(event) {
        if (!event.target.matches('.profile-trigger')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<style>
    /* Class tambahan buat JS */
    .show { display: block !important; }
</style>
</body>
</html>