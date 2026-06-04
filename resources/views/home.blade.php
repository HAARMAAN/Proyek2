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

/* Efek Semi-Transparan (Glassmorphism) */
#navbar { 
    transition: background-color 0.3s, backdrop-filter 0.3s; 
    background-color: rgba(244, 239, 233, 0.8) !important; /* Warna cream dengan transparansi 10% */
    backdrop-filter: blur(10px); /* Efek buram agar terlihat elegan */
    -webkit-backdrop-filter: blur(10px); /* Dukungan untuk Safari */
}
</style>
</head>

<body class="min-h-screen flex flex-col">

<!-- NAVBAR -->
<header id="navbar" class="w-full bg-[#f4efe9] backdrop-blur-md shadow-sm sticky top-0 z-50 transition-all duration-300">
<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

<div class="flex items-center gap-2">
<div class="w-12 h-12 rounded-full overflow-hidden">
    <img src="{{ asset('images/LHB.png') }}"
         alt="Logo"
         class="w-full h-full object-cover">
</div>
<span class="font-semibold text-[#5a3e2b]">Luna Home Beauty</span>
</div>

<nav class="flex gap-8">
<a href="#home" class="nav-link">Home</a>
<a href="#service" class="nav-link">Service</a>

@guest
<a href="#booking" class="nav-link">Booking</a>
@endguest

@guest
<a href="#blog" class="nav-link">Blog</a>
@endguest

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
<img src="{{ asset('images/home.jpg') }}"
class="rounded-2xl shadow-md w-full max-w-md mx-auto">
</div>

</div>
</main>

<!-- SERVICE -->
<section id="service" class="py-16 bg-[#f8f2ec]">

<div class="max-w-7xl mx-auto px-6">

    <!-- TITLE -->
    <div class="text-center mb-14">
        <h2 class="text-4xl font-bold text-[#4E3629]"
            style="font-family: 'Playfair Display', serif;">
            PRICE LIST TREATMENT
        </h2>

        <p class="text-[#7A5C48] mt-3"
           style="font-family: 'Poppins', sans-serif;">
            Pilih layanan terbaik untuk Anda
        </p>
    </div>


    <!-- STUDIO SERVICE -->
    <h3 class="text-2xl font-semibold text-[#5A3E2B] mb-8"
        style="font-family: 'Playfair Display', serif;">
        Luna Home Beauty
    </h3>

    <div class="grid lg:grid-cols-3 gap-5 mb-16 items-start">

        @php
        $home = [
             ["LUNA SIGNATURE SERUM FACIAL + SINAR PDT","130K","Perawatan facial premium dengan kombinasi serum terbaik dan terapi sinar PDT untuk membantu mencerahkan, melembabkan, mengurangi jerawat, dan merawat kulit secara menyeluruh","facial1.jpg"],
            ["BRIGHTENING FACIAL","110K","Facial dengan serum pencerah yang membantu menyamarkan kulit kusam, warna kulit tidak merata & membuat wajah tampak lebih cerah & sehat","facial2.jpg"],
            ["ACNE CARE FACIAL","110K","Facial khusus dengan serum acne untuk membantu mengontrol minyak berlebih, menenangkan jerawat aktif, & membantu merawat kulit berjerawat agar tampak lebih bersih","facial3.jpg"],
            ["CALMING FACIAL","110K","Perawatan facial dengan serum calming yang membantu menenangkan kulit sensitif, kemerahan, dan iritasi sehingga kulit terasa lebih nyaman dan rileks","facial4.jpg"],
            ["HYDRATING FACIAL","110K","Perawatan facial dengan serum hyaluron untuk membantu melembabkan kulit secara maksimal, mengurangi rasa kering, dan membantu kulit terasa kenyal serta fresh","facial5.jpg"],
            ["OIL CONTROL FACIAL","110K","Perawatan facial khusus kulit berminyak untuk mengurangi minyak berlebih, membantu mencegah jerawat, dan membuat kulit tampak lebih bersih dan segar","facial6.jpg"],
            ["DETOX FACIAL","110K","Perawatan facial untuk membersihkan pori-pori dari kotoran dan racun, membantu mengangkat sel kulit mati, serta membuat kulit terasa lebih bersih, segar, dan sehat","facial7.jpg"],
            ["FACIAL MICRODERMABRASI PORE REFINING","150K","Perawatan facial microdermabrasi dengan serum pengecil pori-pori untuk membersihkan pori secara mendalam, membantu mengurangi tampilan pori besar, serta membuat kulit terasa lebih halus, bersih, dan segar","facial8.jpg"],
            ["FACIAL MICRODERMABRASI SALMON DNA","250K","Perawatan microdermabrasi dengan serum DNA salmon untuk membantu regenerasi kulit, mengecilkan pori-pori, menyamarkan garis halus, serta membuat wajah tampak lebih cerah, halus, dan glowing","facial9.jpg"],
            ["LASH LIFT & TINT","90K","Perawatan bulu mata untuk melentikkan dan memberi warna pada bulu mata alami, sehingga terlihat lebih panjang, tebal, rapi, dan ekspresif tanpa perlu maskara","facial10.jpg"],
            ["DERMAPEN ACNE SCARS","310K","Perawatan dermapen untuk membantu memperbaiki tekstur kulit, menyamarkan bekas jerawat, dan merangsang regenerasi kulit agar wajah tampak lebih halus dan merata","facial11.jpg"],
            ["DERMAPEN SALMON DNA","250K","Perawatan dermapen dengan serum salmon DNA untuk membantu regenerasi kulit, memperbaiki tekstur, menyamarkan tanda penuaan, dan membuat kulit tampak lebih sehat, halus, dan glowing","facial12.jpg"],
            ["LUNA PACKAGE FACIAL SERUM + LASH LIFT","200K","Perawatan wajah dengan serum pilihan sesuai kebutuhan kulit untuk membantu membersihkan, menutrisi, dan membuat kulit tampak lebih cerah serta segar. Dipadukan dengan Lash Lift untuk melentikkan dan menegaskan bulu mata secara natural, sehingga wajah terlihat lebih fresh tanpa makeup","facial10.jpg"],
            ["LUNA PACKAGE FACIAL + DERMAPEN ACNE SCARS","410K","Perawatan facial yang dipadukan dengan dermapen untuk membantu memperbaiki tekstur kulit, menyamarkan bekas jerawat, dan merangsang regenerasi kulit agar wajah tampak lebih halus dan merata","facial3.jpg"],
            ["LUNA PACKAGE FACIAL + DERMAPEN DNA SALMON","360K","Perawatan facial yang dipadukan dengan dermapen dengan serum salmon DNA untuk membantu regenerasi kulit, memperbaiki tekstur, menyamarkan tanda penuaan, dan membuat kulit tampak lebih sehat, halus, dan glowing","facial8.jpg"],
            ["BIOPEEL TREATMENT","550K","Biopeel bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, scars, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan","facial13.jpg"],
            ["FACIAL + BIOPEEL TREATMENT","650K","Perawatan facial yang dipadukan dengan treatment biopeel yang bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan","facial13.jpg"],
        ];
        @endphp


        @foreach($studioServices as $index => $s)

        <div class="group bg-white rounded-[24px] p-3 self-start
                    border border-[#F3E3D7]
                    transition-all duration-300 hover:-translate-y-1 relative overflow-hidden"
             style="box-shadow: 0 8px 20px rgba(217,107,52,0.08);">

            <div class="flex gap-4">

                <!-- IMAGE -->
                <div class="w-[140px] h-[120px] flex-shrink-0">
                    <img src="{{ asset('images/' . $s->image) }}"
     class="w-full h-full object-cover rounded-2xl">
                </div>

                <!-- CONTENT -->
                <div class="flex flex-col justify-between flex-1">

                    <div>
                        <h4 class="text-[15px] leading-snug font-bold text-[#6B4226]"
                            style="font-family: 'Playfair Display', serif;">
                            {{ $s->layanan_name }}
                        </h4>

                        <!-- Description on hover or short default -->
                        <div class="transition-all duration-500 ease-in-out max-h-12 group-hover:max-h-80 overflow-hidden">
                            <p class="text-xs text-[#7A5C48] mt-2 leading-relaxed"
                               style="font-family: 'Poppins', sans-serif;">
                                {{ $s->description }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">

                        <span class="text-[#7B4A25] font-bold text-xl">
                            Rp {{ number_format($s->price, 0, ',', '.') }}
                        </span>

                        @auth
                        <button onclick="openBookingModal('{{ $s->id }}', '{{ addslashes($s->layanan_name) }}', '{{ $s->price }}', 'studio')"
                                class="px-5 py-2 rounded-xl text-white text-sm font-medium
                                       hover:scale-105 transition"
                                style="background: linear-gradient(90deg, #E38145, #F2A16B);">
                            Booking
                        </button>
                        @else
                        <button onclick="toggleDetail('detail-{{ $index }}')"
                                class="px-5 py-2 rounded-xl text-white text-sm font-medium
                                       hover:scale-105 transition"
                                style="background: linear-gradient(90deg, #E38145, #F2A16B);">
                            Detail
                        </button>
                        @endauth

                    </div>

                </div>

            </div>

            @guest
            <div id="detail-{{ $index }}"
                 class="hidden mt-4 bg-[#FFF7F2] border border-[#F3E3D7]
                        rounded-2xl p-4 text-sm text-[#7A5C48] leading-relaxed"
                 style="font-family: 'Poppins', sans-serif;">
                {{ $s->description }}
            </div>
            @endguest

        </div>

        @endforeach

    </div>



    <!-- HOME SERVICE -->
    <h3 class="text-2xl font-semibold text-[#5A3E2B] mb-8"
        style="font-family: 'Playfair Display', serif;">
        Special Home Service
    </h3>

    <div class="grid lg:grid-cols-3 gap-5 mb-16 items-start">

        @php
    $home = [
        ["LUNA SIGNATURE SERUM FACIAL + SINAR PDT","130K","Perawatan facial premium dengan kombinasi serum terbaik dan terapi sinar PDT untuk membantu mencerahkan, melembabkan, mengurangi jerawat dan merawat kulit secara menyeluruh","facial1.jpg"],
        ["BRIGHTENING FACIAL","120K","Facial dengan serum pencerah yang membantu menyamarkan kulit kusam, warna kulit tidak merata dan membuat wajah tampak lebih cerah dan sehat","facial2.jpg"],
        ["ACNE CARE FACIAL","120K","Facial khusus dengan serum acne untuk membantu mengontrol minyak berlebih, menenangkan jerawat aktif, & membantu merawat kulit berjerawat agar tampak lebih bersih","facial3.jpg"],
        ["CALMING FACIAL","120K","Perawatan facial dengan serum calming yang membantu menenangkan kulit sensitif, kemerahan, dan iritasi sehingga kulit terasa lebih nyaman dan rileks","facial4.jpg"],
        ["HYDRATING FACIAL","120K","Perawatan facial dengan serum hyaluron untuk membantu melembabkan kulit secara maksimal, mengurangi rasa kering, dan membantu kulit terasa kenyal serta fresh","facial5.jpg"],
        ["OIL CONTROL FACIAL","120K","Perawatan facial khusus kulit berminyak untuk mengurangi minyak berlebih, membantu mencegah jerawat, dan membuat kulit tampak lebih bersih dan segar","facial6.jpg"],
        ["DETOX FACIAL","120K","Perawatan facial untuk membersihkan pori-pori dari kotoran dan racun, membantu mengangkat sel kulit mati, serta membuat kulit terasa lebih bersih, segar, dan sehat","facial7.jpg"],
        ["FACIAL MICRODERMABRASI PORE REFINING","150K","Perawatan facial microdermabrasi dengan serum pengecil pori-pori untuk membersihkan pori secara mendalam, membantu mengurangi tampilan pori besar, serta membuat kulit terasa lebih halus, bersih, dan segar","facial8.jpg"],
        ["FACIAL MICRODERMABRASI SALMON DNA","250K","Perawatan microdermabrasi dengan serum DNA salmon untuk membantu regenerasi kulit, mengecilkan pori-pori, menyamarkan garis halus, serta membuat wajah tampak lebih cerah, halus, dan glowing","facial9.jpg"],
        ["LUNA PACKAGE FACIAL SERUM + LASH LIFT","200K","Perawatan wajah dengan serum pilihan sesuai kebutuhan kulit untuk membantu membersihkan, menutrisi, dan membuat kulit tampak lebih cerah serta segar. Dipadukan dengan Lash Lift untuk melentikkan dan menegaskan bulu mata secara natural, sehingga wajah terlihat lebih fresh tanpa makeup","facial10.jpg"],
        ["LUNA PACKAGE FACIAL + DERMAPEN ACNE SCARS","420K","Perawatan facial yang dipadukan dengan dermapen untuk membantu memperbaiki tekstur kulit, menyamarkan bekas jerawat, dan merangsang regenerasi kulit agar wajah tampak lebih halus dan merata","facial3.jpg"],
        ["LUNA PACKAGE FACIAL + DERMAPEN DNA SALMON","370K","Perawatan facial yang dipadukan dengan dermapen dengan serum salmon DNA untuk membantu regenerasi kulit, memperbaiki tekstur, menyamarkan tanda penuaan, dan membuat kulit tampak lebih sehat, halus, dan glowing","facial8.jpg"],
        ["BIOPEEL TREATMENT","550K","Biopeel bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, scars, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan","facial13.jpg"],
        ["FACIAL + BIOPEEL TREATMENT","650K","Perawatan facial yang dipadukan dengan treatment biopeel yang bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan","facial13.jpg"],
    ];
    @endphp

        @foreach($homeServices as $index => $s)

        <div class="group bg-white rounded-[24px] p-3 self-start
                    border border-[#F3E3D7]
                    transition-all duration-300 hover:-translate-y-1 relative overflow-hidden"
             style="box-shadow: 0 8px 20px rgba(217,107,52,0.08);">

            <div class="flex gap-4">

                <!-- IMAGE -->
                <div class="w-[140px] h-[120px] flex-shrink-0">
                    <img src="{{ asset('images/' . $s->image) }}"
     class="w-full h-full object-cover rounded-2xl">
                </div>

                <!-- CONTENT -->
                <div class="flex flex-col justify-between flex-1">

                    <div>
                        <h4 class="text-[15px] leading-snug font-bold text-[#6B4226]"
                            style="font-family: 'Playfair Display', serif;">
                            {{ $s->layanan_name }}
                        </h4>

                        <!-- Description on hover or short default -->
                        <div class="transition-all duration-500 ease-in-out max-h-12 group-hover:max-h-80 overflow-hidden">
                            <p class="text-xs text-[#7A5C48] mt-2 leading-relaxed"
                               style="font-family: 'Poppins', sans-serif;">
                                {{ $s->description }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">

                        <span class="text-[#7B4A25] font-bold text-xl">
                            Rp {{ number_format($s->price, 0, ',', '.') }}
                        </span>

                        @auth
                        <button onclick="openBookingModal('{{ $s->id }}', '{{ addslashes($s->layanan_name) }}', '{{ $s->price }}', 'home')"
                                class="px-5 py-2 rounded-xl text-white text-sm font-medium
                                       hover:scale-105 transition"
                                style="background: linear-gradient(90deg, #E38145, #F2A16B);">
                            Booking
                        </button>
                        @else
                        <button onclick="toggleDetail('home-detail-{{ $index }}')"
                                class="px-5 py-2 rounded-xl text-white text-sm font-medium
                                       hover:scale-105 transition"
                                style="background: linear-gradient(90deg, #E38145, #F2A16B);">
                            Detail
                        </button>
                        @endauth

                    </div>

                </div>

            </div>

            @guest
            <div id="home-detail-{{ $index }}"
                 class="hidden mt-4 bg-[#FFF7F2] border border-[#F3E3D7]
                        rounded-2xl p-4 text-sm text-[#7A5C48] leading-relaxed"
                 style="font-family: 'Poppins', sans-serif;">
                {{ $s->description }}
            </div>
            @endguest

        </div>

        @endforeach

    </div>

</div>

</section>

<!-- BOOKING -->
@guest
<section id="booking" class="py-20 bg-[#f8f2ec]">

<div class="max-w-2xl mx-auto px-6">

    <!-- TITLE -->
    <div class="text-center mb-10">

        <h2 class="text-4xl font-bold text-[#4E3629]"
            style="font-family: 'Playfair Display', serif;">
            Booking Treatment
        </h2>

    </div>

    <!-- FORM -->
    <form class="bg-white rounded-[30px] p-8 border border-[#F3E3D7]"
          style="box-shadow: 0 10px 25px rgba(217,107,52,0.08);">

        <div class="space-y-5">

            <!-- NAMA -->
            <div>
                <label class="block text-sm mb-2 text-[#6B4226] font-medium"
                       style="font-family: 'Poppins', sans-serif;">
                    Nama Lengkap
                </label>

                <input type="text"
                       placeholder="Masukkan nama Anda"
                       class="w-full rounded-2xl border border-[#E7D5C7]
                              px-4 py-3 focus:outline-none
                              focus:ring-2 focus:ring-[#E8A87C]"
                       style="font-family: 'Poppins', sans-serif;">
            </div>

            <!-- LAYANAN -->
            <div>
                <label class="block text-sm mb-2 text-[#6B4226] font-medium"
                       style="font-family: 'Poppins', sans-serif;">
                    Pilih Treatment
                </label>

                <select class="w-full rounded-2xl border border-[#E7D5C7]
                               px-4 py-3 focus:outline-none
                               focus:ring-2 focus:ring-[#E8A87C]"
                        style="font-family: 'Poppins', sans-serif;">

                    <option>Facial</option>
                    <option>Lash Lift</option>
                    <option>Home Service</option>

                </select>
            </div>

            <!-- TANGGAL -->
            <div>
                <label class="block text-sm mb-2 text-[#6B4226] font-medium"
                       style="font-family: 'Poppins', sans-serif;">
                    Tanggal Booking
                </label>

                <input type="date"
                       class="w-full rounded-2xl border border-[#E7D5C7]
                              px-4 py-3 focus:outline-none
                              focus:ring-2 focus:ring-[#E8A87C]"
                       style="font-family: 'Poppins', sans-serif;">
            </div>

            <!-- BUTTON -->
            <a href="{{ route('login') }}"
               class="block text-center text-white py-3 rounded-2xl
                      font-medium mt-6 hover:scale-[1.02]
                      transition duration-300"
               style="font-family: 'Poppins', sans-serif;
                      background: linear-gradient(90deg, #D96B34, #F2A16B);">

                Login untuk Booking

            </a>

        </div>

    </form>

</div>

</section>
@endguest

@guest
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
<img src="{{ asset('images/blog1.jpg') }}"class="w-full h-60 object-cover">
<div class="p-6">
<h3 class="text-xl font-semibold text-[#5a3e2b] mb-3">Tips Skincare</h3>
<p class="text-[#7a5c48] text-sm">
Gunakan cleanser, sunscreen, dan moisturizer secara rutin untuk menjaga kulit tetap sehat dan glowing.
</p>
</div>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-md">
<img src="{{ asset('images/blog2.jpg') }}" class="w-full h-60 object-cover">
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
@endguest

@include('components.footer')

@auth
<!-- MIDTRANS SNAP JS SDK -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<!-- BOOKING MODAL (POP-UP) -->
<div id="bookingModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300">
    <!-- Modal Box -->
    <div class="relative w-full max-w-lg bg-[#fdf8f4] rounded-[30px] border border-[#F3E3D7] p-8 shadow-2xl transform scale-95 transition-all duration-300">
        <!-- Close Button -->
        <button onclick="closeBookingModal()" class="absolute top-5 right-5 text-[#7A5C48] hover:text-[#d66a2f] hover:rotate-90 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-[#5A3E2B]" style="font-family: 'Playfair Display', serif;">
                Booking Treatment
            </h3>
            <p class="text-xs text-[#7A5C48] mt-1">Konfirmasi jadwal treatment terbaik untuk Anda</p>
        </div>

        <!-- Form -->
        <form id="bookingForm" onsubmit="submitBooking(event)" class="space-y-4">
            @csrf
            
            <input type="hidden" name="layanan_id" id="modalLayananId">

            <!-- Selected Service Details -->
            <div class="bg-white p-4 rounded-2xl border border-[#F3E3D7] shadow-sm">
                <label class="block text-[11px] font-semibold text-[#7A5C48] uppercase tracking-wider mb-1">Layanan Dipilih</label>
                <div class="font-bold text-[#5A3E2B] text-base" id="modalLayananName" style="font-family: 'Playfair Display', serif;">-</div>
                <div class="text-[#d96b34] font-bold mt-1 text-lg" id="modalLayananPrice">-</div>
            </div>

            <!-- Date and Time -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-[#6B4226] mb-2">Tanggal Booking</label>
                    <input type="date" name="booking_date" id="modalBookingDate" required 
                           class="w-full rounded-xl border border-[#E7D5C7] px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E8A87C] bg-white text-[#5A3E2B]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#6B4226] mb-2">Jam Booking</label>
                    <input type="time" name="booking_time" id="modalBookingTime" required 
                           class="w-full rounded-xl border border-[#E7D5C7] px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E8A87C] bg-white text-[#5A3E2B]">
                </div>
            </div>

            <!-- Location Type -->
            <div>
                <label class="block text-xs font-semibold text-[#6B4226] mb-2">Tipe Lokasi</label>
                <select name="location_type" id="modalLocationType" required onchange="toggleAddressField()"
                        class="w-full rounded-xl border border-[#E7D5C7] px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E8A87C] bg-white text-[#5A3E2B]">
                    <option value="studio">🏢 Luna Home Beauty (Datang ke Studio)</option>
                    <option value="home_service">🏠 Home Service (Panggil ke Rumah)</option>
                </select>
            </div>

            <!-- Address Field (Conditional) -->
            <div id="addressContainer" class="hidden transition-all duration-300">
                <label class="block text-xs font-semibold text-[#6B4226] mb-2">Alamat Lengkap</label>
                <textarea name="service_address" id="modalServiceAddress" placeholder="Masukkan alamat lengkap pengiriman home service..." 
                          class="w-full rounded-xl border border-[#E7D5C7] px-4 py-2.5 text-sm h-20 resize-none focus:outline-none focus:ring-2 focus:ring-[#E8A87C] bg-white text-[#5A3E2B]"></textarea>
            </div>

            <!-- Payment Method -->
            <div>
                <label class="block text-xs font-semibold text-[#6B4226] mb-2">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="modalMetodePembayaran" required
                        class="w-full rounded-xl border border-[#E7D5C7] px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#E8A87C] bg-white text-[#5A3E2B]">
                    <option value="cash">💵 Cash (Bayar di Tempat)</option>
                    <option value="transfer">📱 Transfer Bank (Midtrans)</option>
                </select>
            </div>

            <!-- Error message container -->
            <div id="modalErrorContainer" class="hidden text-xs text-red-500 bg-red-50 p-3 rounded-xl border border-red-200">
            </div>

            <!-- Submit Button -->
            <button type="submit" id="submitBtn" class="w-full py-3 rounded-2xl text-white font-semibold text-base transition-all duration-300 shadow-md hover:scale-[1.02] active:scale-[0.98]" 
                    style="background: linear-gradient(90deg, #D96B34, #F2A16B);">
                <span id="btnText">KONFIRMASI BOOKING</span>
                <span id="btnSpinner" class="hidden inline-block animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full ml-2 align-middle"></span>
            </button>
        </form>
    </div>
</div>
@endauth

<script>
function toggleDetail(id) {
    const el = document.getElementById(id);

    if (el.classList.contains('hidden')) {
        el.classList.remove('hidden');
    } else {
        el.classList.add('hidden');
    }
}

@auth
function openBookingModal(id, name, price, serviceType) {
    const modal = document.getElementById('bookingModal');
    const modalBox = modal.querySelector('div');
    
    // Set form fields
    document.getElementById('modalLayananId').value = id;
    document.getElementById('modalLayananName').innerText = name;
    
    // Format price elegantly
    const formattedPrice = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0
    }).format(price);
    document.getElementById('modalLayananPrice').innerText = formattedPrice;

    // Pre-select location type based on the service category
    const locSelect = document.getElementById('modalLocationType');
    if (serviceType === 'home') {
        locSelect.value = 'home_service';
    } else {
        locSelect.value = 'studio';
    }
    toggleAddressField();

    // Reset error container & form
    const errorContainer = document.getElementById('modalErrorContainer');
    errorContainer.classList.add('hidden');
    errorContainer.innerHTML = '';
    
    // Reset submit button state
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    submitBtn.disabled = false;
    btnText.innerText = 'KONFIRMASI BOOKING';
    btnSpinner.classList.add('hidden');

    // Show modal with animation
    modal.classList.remove('opacity-0', 'pointer-events-none');
    modalBox.classList.remove('scale-95');
    modalBox.classList.add('scale-100');
    
    // Disable body scroll when modal is open
    document.body.classList.add('overflow-hidden');
}

function closeBookingModal() {
    const modal = document.getElementById('bookingModal');
    const modalBox = modal.querySelector('div');
    
    // Hide modal with animation
    modal.classList.add('opacity-0', 'pointer-events-none');
    modalBox.classList.remove('scale-100');
    modalBox.classList.add('scale-95');
    
    // Enable body scroll
    document.body.classList.remove('overflow-hidden');
}

// Close modal if user clicks outside of modal box
window.addEventListener('click', function(event) {
    const modal = document.getElementById('bookingModal');
    if (event.target === modal) {
        closeBookingModal();
    }
});

function toggleAddressField() {
    const locationType = document.getElementById('modalLocationType').value;
    const addressContainer = document.getElementById('addressContainer');
    const addressInput = document.getElementById('modalServiceAddress');
    
    if (locationType === 'home_service') {
        addressContainer.classList.remove('hidden');
        addressInput.setAttribute('required', 'required');
    } else {
        addressContainer.classList.add('hidden');
        addressInput.removeAttribute('required');
        addressInput.value = '';
    }
}

function submitBooking(event) {
    event.preventDefault();
    
    const form = document.getElementById('bookingForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const errorContainer = document.getElementById('modalErrorContainer');
    
    // Clear and hide errors
    errorContainer.classList.add('hidden');
    errorContainer.innerHTML = '';
    
    // Show spinner & disable button
    submitBtn.disabled = true;
    btnText.innerText = 'MEMPROSES...';
    btnSpinner.classList.remove('hidden');
    
    const formData = new FormData(form);
    
    fetch("{{ route('customer.booking.store') }}", {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(response => {
        const contentType = response.headers.get("content-type");
        if (contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(data => {
                if (!response.ok) {
                    throw data;
                }
                return data;
            });
        } else {
            throw new Error("Server mengembalikan respons yang tidak valid (bukan JSON). Silakan hubungi admin.");
        }
    })
    .then(data => {
        if (data.success) {
            if (data.payment_type === 'transfer' && data.snap_token) {
                // If it is transfer, trigger Midtrans Snap
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        window.location.href = data.redirect_url + "?status=success";
                    },
                    onPending: function(result) {
                        window.location.href = data.redirect_url + "?status=pending";
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal, silakan coba lagi.");
                        // Reset button
                        submitBtn.disabled = false;
                        btnText.innerText = 'KONFIRMASI BOOKING';
                        btnSpinner.classList.add('hidden');
                    },
                    onClose: function() {
                        alert("Anda menutup halaman pembayaran sebelum selesai.");
                        // Redirect to profile anyway so they can see pending booking
                        window.location.href = data.redirect_url;
                    }
                });
            } else {
                // If it is cash booking, redirect directly
                window.location.href = data.redirect_url + "?status=success";
            }
        } else {
            throw new Error(data.message || 'Terjadi kesalahan pada sistem.');
        }
    })
    .catch(error => {
        console.error('Error booking:', error);
        
        // Show validation errors or general error message
        let errorMsg = 'Terjadi kesalahan. Silakan periksa kembali input Anda.';
        if (error.errors) {
            errorMsg = Object.values(error.errors).flat().join('<br>');
        } else if (error.message) {
            errorMsg = error.message;
        }
        
        errorContainer.innerHTML = errorMsg;
        errorContainer.classList.remove('hidden');
        
        // Reset button
        submitBtn.disabled = false;
        btnText.innerText = 'KONFIRMASI BOOKING';
        btnSpinner.classList.add('hidden');
    });
}
@endauth
</script>

</body>
</html>