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
                    Detail
                </button>
            </div>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>