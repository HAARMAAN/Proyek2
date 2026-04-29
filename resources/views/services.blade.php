<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service - Luna Home Beauty</title>

    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700|poppins:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7efe5;
        }
        .font-heading {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body>

<div class="max-w-7xl mx-auto px-6 py-12">

    <!-- HEADER -->
    <div class="text-center mb-10">
        <div class="inline-block bg-orange-100 text-[#d96b34] px-4 py-1 rounded-full text-sm font-semibold mb-4">
            Our Services
        </div>

        <h1 class="text-4xl font-heading font-bold text-[#5a3e2b]">
            PRICE LIST TREATMENT
        </h1>

        <p class="text-[#7a5c48] mt-2">
            Pilih treatment yang sesuai dengan kebutuhan kulit anda
        </p>
    </div>

    <!-- ======================= -->
    <!-- LUNA HOME BEAUTY -->
    <!-- ======================= -->
    <h2 class="text-2xl font-semibold text-[#5a3e2b] mb-6">Luna Home Beauty</h2>

    <div class="grid md:grid-cols-3 gap-6">

        @php
        $services = [
            ["LUNA SIGNATURE SERUM FACIAL + SINAR PDT","130K","Facial premium + PDT untuk mencerahkan & merawat kulit"],
            ["BRIGHTENING FACIAL","110K","Mencerahkan kulit kusam & tidak merata"],
            ["ACNE CARE FACIAL","110K","Mengontrol minyak & merawat jerawat"],
            ["CALMING FACIAL","110K","Menenangkan kulit sensitif & iritasi"],
            ["HYDRATING FACIAL","110K","Melembabkan kulit kering"],
            ["OIL CONTROL FACIAL","110K","Mengontrol minyak berlebih"],
            ["DETOX FACIAL","110K","Membersihkan racun & kotoran"],
            ["MICRODERMABRASI PORE REFINING","150K","Mengecilkan pori-pori"],
            ["MICRODERMABRASI SALMON DNA","250K","Regenerasi kulit & glowing"],
            ["LASH LIFT & TINT","90K","Bulu mata lentik & tebal"],
            ["DERMAPEN ACNE SCARS","310K","Menghilangkan bekas jerawat"],
            ["DERMAPEN SALMON DNA","250K","Peremajaan kulit"],
            ["PACKAGE FACIAL + LASH LIFT","200K","Facial + lash lift"],
            ["PACKAGE FACIAL + DERMAPEN ACNE","410K","Perbaikan tekstur kulit"],
            ["PACKAGE FACIAL + DNA SALMON","360K","Regenerasi & anti aging"],
            ["BIOPEEL TREATMENT","550K","Mengurangi noda & jerawat"],
            ["FACIAL + BIOPEEL","650K","Facial + biopeel lengkap"],
        ];
        @endphp

        @foreach($services as $item)
        <div class="bg-[#fdf8f4] p-6 rounded-2xl shadow-sm hover:shadow-md transition">

            <h3 class="font-semibold text-[#5a3e2b] mb-2">
                {{ $item[0] }}
            </h3>

            <p class="text-sm text-[#7a5c48] mb-4">
                {{ $item[2] }}
            </p>

            <div class="flex justify-between items-center">
                <span class="text-[#d96b34] font-bold text-lg">
                    {{ $item[1] }}
                </span>

                <button class="bg-[#d96b34] text-white px-4 py-1 rounded-full text-sm">
                    Pilih
                </button>
            </div>

        </div>
        @endforeach

    </div>


    <!-- ======================= -->
    <!-- HOME SERVICE -->
    <!-- ======================= -->
    <h2 class="text-2xl font-semibold text-[#5a3e2b] mt-16 mb-6">
        Special Home Service
    </h2>

    @php
    $homeServices = [
        ["SIGNATURE FACIAL + PDT","130K"],
        ["BRIGHTENING FACIAL","120K"],
        ["ACNE CARE FACIAL","120K"],
        ["CALMING FACIAL","120K"],
        ["HYDRATING FACIAL","120K"],
        ["OIL CONTROL FACIAL","120K"],
        ["DETOX FACIAL","120K"],
        ["MICRODERMABRASI PORE","150K"],
        ["MICRODERMABRASI DNA","250K"],
        ["PACKAGE FACIAL + LASH","200K"],
        ["PACKAGE + DERMAPEN ACNE","420K"],
        ["PACKAGE + DNA SALMON","370K"],
        ["BIOPEEL","550K"],
        ["FACIAL + BIOPEEL","650K"],
    ];
    @endphp

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($homeServices as $item)
        <div class="bg-[#fff] p-6 rounded-2xl shadow-sm hover:shadow-md transition">

            <h3 class="font-semibold text-[#5a3e2b] mb-4">
                {{ $item[0] }}
            </h3>

            <div class="flex justify-between items-center">
                <span class="text-[#d96b34] font-bold text-lg">
                    {{ $item[1] }}
                </span>

                <button class="bg-[#d96b34] text-white px-4 py-1 rounded-full text-sm">
                    Pilih
                </button>
            </div>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>