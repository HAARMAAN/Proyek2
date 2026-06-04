<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Luna Beauty - @yield('title')</title>

<!-- FONT -->
<link href="https://fonts.bunny.net/css?family=playfair-display:600,700|poppins:400,500,600" rel="stylesheet" />

<style>
html { scroll-behavior: smooth; }

body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #f4efe9;
    overflow-x: hidden;
}

/* NAVBAR (SAMA KAYAK HOME) */
.navbar {
    width: 100%;
    background: #f8f2ec;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    position: sticky;
    top: 0;
    z-index: 50;
}

.nav-container {
    max-width: 1280px;
    margin: auto;
    padding: 16px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* LOGO */
.logo-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo-wrap img {
    height: 40px;
    object-fit: contain;
}

.logo-text {
    font-weight: 600;
    color: #5a3e2b;
}

/* MENU */
.nav-menu {
    display: flex;
    gap: 24px;
}

.nav-link {
    color: #6d5244;
    text-decoration: none;
    font-weight: 500;
}

.nav-link:hover {
    color: #d66a2f;
}

/* DROPDOWN */
.dropdown {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-top: 10px;
    overflow: hidden;
}

.dropdown-menu a,
.dropdown-menu button {
    display: block;
    padding: 10px 14px;
    text-decoration: none;
    color: #333;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
}

.dropdown-menu a:hover,
.dropdown-menu button:hover {
    background: #f5f5f5;
}

.show {
    display: block;
}

/* CONTENT */
.content {
    padding: 40px 10%;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="nav-container">

        <!-- LOGO (FIX PASTI MUNCUL) -->
        <div class="logo-wrap">
            <img src="{{ asset('images/LHB.png') }}" alt="Logo">
            <div class="logo-text">Luna Home Beauty</div>
        </div>

        <!-- MENU -->
        <nav class="nav-menu">
            @auth
            <a href="{{ route('home') }}" class="nav-link" style="color: #d66a2f; font-weight: 600;">Kembali ke Layanan</a>
            @endauth
            <a href="{{ route('customer.riwayat') }}" class="nav-link">Riwayat</a>
            <a href="{{ route('customer.loyalitas') }}" class="nav-link">Loyalitas</a>

            <!-- PROFILE -->
            <div class="dropdown">
                <span onclick="toggleDropdown()" class="nav-link" style="cursor:pointer;">
                    Profil ▾
                </span>

                <div id="dropdown" class="dropdown-menu">
                    <a href="{{ route('customer.dashboard') }}">Profil Saya</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

    </div>
</header>

<!-- CONTENT -->
<main class="content">
    @yield('content')
</main>

<script>
function toggleDropdown() {
    document.getElementById("dropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.nav-link')) {
        let dropdown = document.getElementById("dropdown");
        if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        }
    }
}
</script>

</body>
</html>