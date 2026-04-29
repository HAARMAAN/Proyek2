<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Luna Home Beauty</title>

<link href="https://fonts.bunny.net/css?family=playfair-display:600,700|poppins:400,500,600" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>

<style>
html { scroll-behavior: smooth; }

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4efe9;
}

.font-heading { font-family: 'Playfair Display', serif; }

.nav-link {
    color: #6d5244;
    font-weight: 500;
}
.nav-link:hover { color: #d66a2f; }

.btn-main {
    background-color: #d66a2f;
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 600;
}
.btn-main:hover {
    background-color: #bf5b25;
}
</style>
</head>

<body class="min-h-screen flex flex-col">

<!-- NAVBAR -->
<header class="w-full bg-[#f8f2ec] shadow-sm sticky top-0 z-50">
<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-[#d66a2f] flex items-center justify-center text-white font-bold">L</div>
<span class="font-semibold text-[#5a3e2b]">Luna Home Beauty</span>
</div>

<nav class="flex gap-8">
<a href="#home" class="nav-link">Home</a>
<a href="#service" class="nav-link">Service</a>

@guest
<a href="#booking" class="nav-link">Booking</a>
@endguest

<a href="#blog" class="nav-link">Blog</a>

@auth
<a href="{{ route('customer.dashboard') }}" class="nav-link font-semibold">Profil</a>
@endauth
</nav>

</div>
</header>

<!-- HERO -->
<main id="home" class="flex-grow flex items-center bg-[#f4efe9]">
<div class="max-w-7xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12">

<div class="flex-1">

<div class="inline-block bg-[#fbe5d6] text-[#d66a2f] px-4 py-1 rounded-full text-sm font-semibold mb-6">
✨ Premium Beauty Treatment
</div>

<h1 class="text-5xl md:text-6xl font-heading font-bold text-[#4e3629] mb-6">
Perawatan Premium <br> Langsung ke Rumah Anda
</h1>

<p class="text-[#7a5c48] text-lg mb-6">
Manjakan dirimu dengan treatment terbaik dari Luna Home Beauty.
</p>

@guest
<div class="flex gap-4">
<a href="{{ route('register') }}" class="btn-main">Daftar</a>
<a href="{{ route('login') }}"
class="border border-[#d66a2f] text-[#d66a2f] px-6 py-2 rounded-lg font-semibold hover:bg-[#d66a2f] hover:text-white">
Login
</a>
</div>
@endguest

@auth
<a href="#service" class="btn-main">Lihat Layanan</a>
@endauth

</div>

<div class="flex-1">
<img src="https://images.unsplash.com/photo-1596755389378-c31d21fd1273?q=80&w=800"
class="rounded-2xl shadow-md w-full max-w-md mx-auto">
</div>

</div>
</main>

<!-- SERVICE -->
<section id="service" class="py-16 bg-[#f8f2ec]">
<div class="max-w-7xl mx-auto px-6">

<h2 class="text-4xl font-heading font-bold text-[#4e3629] text-center mb-10">
PRICE LIST TREATMENT
</h2>

<h3 class="text-xl font-semibold text-[#5a3e2b] mb-6">Luna Home Beauty</h3>

<div class="grid md:grid-cols-3 gap-6">

@php
$services = [
["LUNA SIGNATURE SERUM FACIAL + SINAR PDT","130K"],
["BRIGHTENING FACIAL","110K"],
["ACNE CARE FACIAL","110K"],
["CALMING FACIAL","110K"],
["HYDRATING FACIAL","110K"],
["OIL CONTROL FACIAL","110K"],
["DETOX FACIAL","110K"],
["MICRODERMABRASI PORE","150K"],
["MICRODERMABRASI DNA","250K"],
["LASH LIFT & TINT","90K"],
["DERMAPEN ACNE","310K"],
["DERMAPEN DNA","250K"],
["PACKAGE + LASH","200K"],
["PACKAGE + DERMAPEN","410K"],
["PACKAGE + DNA","360K"],
["BIOPEEL","550K"],
["FACIAL + BIOPEEL","650K"],
];
@endphp

@foreach($services as $s)
<div class="bg-white p-5 rounded-2xl shadow-sm hover:shadow-md transition">
<h4 class="font-semibold text-[#5a3e2b]">{{ $s[0] }}</h4>
<div class="flex justify-between mt-4">
<span class="text-[#d66a2f] font-bold">{{ $s[1] }}</span>
<button class="bg-[#d66a2f] text-white px-3 py-1 rounded-full text-sm">Pilih</button>
</div>
</div>
@endforeach

</div>

<h3 class="text-xl font-semibold text-[#5a3e2b] mt-12 mb-6">Special Home Service</h3>

<div class="grid md:grid-cols-3 gap-6">

@php
$home = [
["BRIGHTENING FACIAL","120K"],
["ACNE CARE","120K"],
["CALMING","120K"],
["HYDRATING","120K"],
["OIL CONTROL","120K"],
["DETOX","120K"],
["MICRODERMABRASI","150K"],
["DNA SALMON","250K"],
["PACKAGE + LASH","200K"],
["PACKAGE + DERMAPEN","420K"],
["PACKAGE + DNA","370K"],
["BIOPEEL","550K"],
["FACIAL + BIOPEEL","650K"],
];
@endphp

@foreach($home as $h)
<div class="bg-white p-5 rounded-2xl shadow-sm hover:shadow-md transition">
<h4 class="font-semibold text-[#5a3e2b]">{{ $h[0] }}</h4>
<div class="flex justify-between mt-4">
<span class="text-[#d66a2f] font-bold">{{ $h[1] }}</span>
<button class="bg-[#d66a2f] text-white px-3 py-1 rounded-full text-sm">Pilih</button>
</div>
</div>
@endforeach

</div>

</div>
</section>

<!-- BOOKING -->
@guest
<section id="booking" class="py-16 bg-[#f4efe9]">
<div class="max-w-2xl mx-auto px-6">

<h2 class="text-3xl font-bold text-[#4e3629] mb-6">Booking Layanan</h2>

<form class="bg-white p-6 rounded-2xl shadow-sm space-y-4">
<input type="text" placeholder="Nama" class="w-full border p-2 rounded">
<select class="w-full border p-2 rounded">
<option>Facial</option>
<option>Lash Lift</option>
<option>Home Service</option>
</select>
<input type="date" class="w-full border p-2 rounded">

<a href="{{ route('login') }}" class="block text-center bg-[#d66a2f] text-white py-2 rounded-lg">
Login untuk Booking
</a>
</form>

</div>
</section>
@endguest

<!-- BLOG -->
<section id="blog" class="py-20 bg-[#f8f2ec]">
<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-14">
<div class="inline-block bg-[#fbe5d6] text-[#d66a2f] px-4 py-1 rounded-full text-sm font-semibold mb-4">
Beauty Articles
</div>

<h2 class="text-4xl font-heading font-bold text-[#4e3629]">
Tips & Perawatan Kulit
</h2>

<p class="text-[#7a5c48] mt-3 max-w-xl mx-auto">
Temukan tips kecantikan dan manfaat perawatan untuk kulit sehat dan glowing.
</p>
</div>

<div class="grid md:grid-cols-2 gap-10">

<div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-md">
<img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?q=80&w=800" class="w-full h-60 object-cover">
<div class="p-6">
<h3 class="text-xl font-semibold text-[#5a3e2b] mb-3">Tips Skincare</h3>
<p class="text-[#7a5c48] text-sm">
Gunakan cleanser, sunscreen, dan moisturizer secara rutin untuk menjaga kulit tetap sehat dan glowing.
</p>
</div>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-md">
<img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?q=80&w=800" class="w-full h-60 object-cover">
<div class="p-6">
<h3 class="text-xl font-semibold text-[#5a3e2b] mb-3">Manfaat Facial</h3>
<p class="text-[#7a5c48] text-sm">
Facial membantu membersihkan pori-pori dan membuat kulit lebih cerah.
</p>
</div>
</div>

</div>

</div>
</section>

<footer class="text-center text-sm text-[#7a5c48] py-6">
© 2026 Luna Home Beauty
</footer>

</body>
</html>