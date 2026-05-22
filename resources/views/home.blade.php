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

        <div class="bg-white rounded-[24px] p-3 self-start
                    border border-[#F3E3D7]
                    transition duration-300 hover:-translate-y-1"
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

                        @auth
                        <p class="text-sm text-[#7A5C48] mt-2 leading-relaxed"
                           style="font-family: 'Poppins', sans-serif;">
                            {{ \Illuminate\Support\Str::limit($s->description, 80) }}
                        </p>
                        @endauth
                    </div>

                    <div class="flex items-center justify-between mt-4">

                        <span class="text-[#7B4A25] font-bold text-xl">
                            Rp {{ number_format($s->price, 0, ',', '.') }}
                        </span>

                        @auth
                        <a href="{{ route('customer.booking.create', $s->id) }}"
                           class="px-5 py-2 rounded-xl text-white text-sm font-medium
                                  hover:scale-105 transition"
                           style="background: linear-gradient(90deg, #E38145, #F2A16B);">
                            Booking
                        </a>
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

        @foreach($studioServices as $index => $s)

        <div class="bg-white rounded-[24px] p-3 self-start
                    border border-[#F3E3D7]
                    transition duration-300 hover:-translate-y-1"
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

                        @auth
                        <p class="text-sm text-[#7A5C48] mt-2 leading-relaxed"
                           style="font-family: 'Poppins', sans-serif;">
                           {{ \Illuminate\Support\Str::limit($s->description, 80) }}
                        </p>
                        @endauth
                    </div>

                    <div class="flex items-center justify-between mt-4">

                        <span class="text-[#7B4A25] font-bold text-xl">
                            Rp {{ number_format($s->price, 0, ',', '.') }}
                        </span>

                        @auth
                        <a href="{{ route('customer.booking.create', $s->id) }}"
                           class="px-5 py-2 rounded-xl text-white text-sm font-medium
                                  hover:scale-105 transition"
                           style="background: linear-gradient(90deg, #E38145, #F2A16B);">
                            Booking
                        </a>
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

<footer class="text-center text-sm text-[#7a5c48] py-6">
© 2026 Luna Home Beauty
</footer>


<script>
function toggleDetail(id) {
    const el = document.getElementById(id);

    if (el.classList.contains('hidden')) {
        el.classList.remove('hidden');
    } else {
        el.classList.add('hidden');
    }
}
</script>

</body>
</html>