@extends('layouts.customer')

@section('content')

@php
$services = [
            ["LUNA SIGNATURE SERUM FACIAL + SINAR PDT","130K","Perawatan facial premium dengan kombinasi serum terbaik dan terapi sinar PDT untuk membantu mencerahkan, melembabkan, mengurangi jerawat, dan merawat kulit secara menyeluruh."],
            ["BRIGHTENING FACIAL","110K","Facial dengan serum pencerah yang membantu menyamarkan kulit kusam, warna kulit tidak merata & membuat wajah tampak lebih cerah & sehat."],
            ["ACNE CARE FACIAL","110K","Facial khusus dengan serum acne untuk membantu mengontrol minyak berlebih, menenangkan jerawat aktif, & membantu merawat kulit berjerawat agar tampak lebih bersih."],
            ["CALMING FACIAL","110K","Perawatan facial dengan serum calming yang membantu menenangkan kulit sensitif, kemerahan, dan iritasi sehingga kulit terasa lebih nyaman dan rileks."],
            ["HYDRATING FACIAL","110K","Perawatan facial dengan serum hyaluron untuk membantu melembabkan kulit secara maksimal, mengurangi rasa kering, dan membantu kulit terasa kenyal serta fresh."],
            ["OIL CONTROL FACIAL","110K","Perawatan facial khusus kulit berminyak untuk mengurangi minyak berlebih, membantu mencegah jerawat, dan membuat kulit tampak lebih bersih dan segar."],
            ["DETOX FACIAL","110K","Perawatan facial untuk membersihkan pori-pori dari kotoran dan racun, membantu mengangkat sel kulit mati, serta membuat kulit terasa lebih bersih, segar, dan sehat."],
            ["FACIAL MICRODERMABRASI PORE REFINING","150K","Perawatan facial microdermabrasi dengan serum pengecil pori-pori untuk membersihkan pori secara mendalam, membantu mengurangi tampilan pori besar, serta membuat kulit terasa lebih halus, bersih, dan segar."],
            ["FACIAL MICRODERMABRASI SALMON DNA","250K","Perawatan microdermabrasi dengan serum DNA salmon untuk membantu regenerasi kulit, mengecilkan pori-pori, menyamarkan garis halus, serta membuat wajah tampak lebih cerah, halus, dan glowing."],
            ["LASH LIFT & TINT","90K","Perawatan bulu mata untuk melentikkan dan memberi warna pada bulu mata alami, sehingga terlihat lebih panjang, tebal, rapi, dan ekspresif tanpa perlu maskara."],
            ["DERMAPEN ACNE SCARS","310K","Perawatan dermapen untuk membantu memperbaiki tekstur kulit, menyamarkan bekas jerawat, dan merangsang regenerasi kulit agar wajah tampak lebih halus dan merata."],
            ["DERMAPEN SALMON DNA","250K","Perawatan dermapen dengan serum salmon DNA untuk membantu regenerasi kulit, memperbaiki tekstur, menyamarkan tanda penuaan, dan membuat kulit tampak lebih sehat, halus, dan glowing."],
            ["LUNA PACKAGE FACIAL SERUM + LASH LIFT","200K","Perawatan wajah dengan serum pilihan sesuai kebutuhan kulit untuk membantu membersihkan, menutrisi, dan membuat kulit tampak lebih cerah serta segar. Dipadukan dengan Lash Lift untuk melentikkan dan menegaskan bulu mata secara natural, sehingga wajah terlihat lebih fresh tanpa makeup."],
            ["LUNA PACKAGE FACIAL + DERMAPEN ACNE SCARS","410K","Perawatan facial yang dipadukan dengan dermapen untuk membantu memperbaiki tekstur kulit, menyamarkan bekas jerawat, dan merangsang regenerasi kulit agar wajah tampak lebih halus dan merata."],
            ["LUNA PACKAGE FACIAL + DERMAPEN DNA SALMON","360K","Perawatan facial yang dipadukan dengan dermapen dengan serum salmon DNA untuk membantu regenerasi kulit, memperbaiki tekstur, menyamarkan tanda penuaan, dan membuat kulit tampak lebih sehat, halus, dan glowing."],
            ["BIOPEEL TREATMENT","550K","Biopeel bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, scars, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan."],
            ["FACIAL + BIOPEEL TREATMENT","650K","Perawatan facial yang dipadukan dengan treatment biopeel yang bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan."],
        ];

$home = [
        ["LUNA SIGNATURE SERUM FACIAL + SINAR PDT","130K","Perawatan facial premium dengan kombinasi serum terbaik dan terapi sinar PDT untuk membantu mencerahkan, melembabkan, mengurangi jerawat dan merawat kulit secara menyeluruh."],
        ["BRIGHTENING FACIAL","120K","Facial dengan serum pencerah yang membantu menyamarkan kulit kusam, warna kulit tidak merata dan membuat wajah tampak lebih cerah dan sehat."],
        ["ACNE CARE FACIAL","120K","Facial khusus dengan serum acne untuk membantu mengontrol minyak berlebih, menenangkan jerawat aktif, & membantu merawat kulit berjerawat agar tampak lebih bersih."],
        ["CALMING FACIAL","120K","Perawatan facial dengan serum calming yang membantu menenangkan kulit sensitif, kemerahan, dan iritasi sehingga kulit terasa lebih nyaman dan rileks."],
        ["HYDRATING FACIAL","120K","Perawatan facial dengan serum hyaluron untuk membantu melembabkan kulit secara maksimal, mengurangi rasa kering, dan membantu kulit terasa kenyal serta fresh."],
        ["OIL CONTROL FACIAL","120K","Perawatan facial khusus kulit berminyak untuk mengurangi minyak berlebih, membantu mencegah jerawat, dan membuat kulit tampak lebih bersih dan segar."],
        ["DETOX FACIAL","120K","Perawatan facial untuk membersihkan pori-pori dari kotoran dan racun, membantu mengangkat sel kulit mati, serta membuat kulit terasa lebih bersih, segar, dan sehat."],
        ["FACIAL MICRODERMABRASI PORE REFINING","150K","Perawatan facial microdermabrasi dengan serum pengecil pori-pori untuk membersihkan pori secara mendalam, membantu mengurangi tampilan pori besar, serta membuat kulit terasa lebih halus, bersih, dan segar."],
        ["FACIAL MICRODERMABRASI SALMON DNA","250K","Perawatan microdermabrasi dengan serum DNA salmon untuk membantu regenerasi kulit, mengecilkan pori-pori, menyamarkan garis halus, serta membuat wajah tampak lebih cerah, halus, dan glowing."],
        ["LUNA PACKAGE FACIAL SERUM + LASH LIFT","200K","Perawatan wajah dengan serum pilihan sesuai kebutuhan kulit untuk membantu membersihkan, menutrisi, dan membuat kulit tampak lebih cerah serta segar. Dipadukan dengan Lash Lift untuk melentikkan dan menegaskan bulu mata secara natural, sehingga wajah terlihat lebih fresh tanpa makeup."],
        ["LUNA PACKAGE FACIAL + DERMAPEN ACNE SCARS","420K","Perawatan facial yang dipadukan dengan dermapen untuk membantu memperbaiki tekstur kulit, menyamarkan bekas jerawat, dan merangsang regenerasi kulit agar wajah tampak lebih halus dan merata."],
        ["LUNA PACKAGE FACIAL + DERMAPEN DNA SALMON","370K","Perawatan facial yang dipadukan dengan dermapen dengan serum salmon DNA untuk membantu regenerasi kulit, memperbaiki tekstur, menyamarkan tanda penuaan, dan membuat kulit tampak lebih sehat, halus, dan glowing."],
        ["BIOPEEL TREATMENT","550K","Biopeel bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, scars, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan."],
        ["FACIAL + BIOPEEL TREATMENT","650K","Perawatan facial yang dipadukan dengan treatment biopeel yang bekerja dengan teknologi dua fase untuk memperbaiki tekstur kulit, membantu mengurangi jerawat dan noda hitam, serta membuat kulit tampak lebih cerah dan halus tanpa pengelupasan berlebihan."],
    ];
@endphp


<div style="width: 100%; max-width: 1100px; margin: 0 auto; font-family: 'Jost', sans-serif;">

    <!-- TITLE -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-family: 'Hanuman'; font-size: 36px; color: #5a3e2b;">
            SERVICES
        </h1>
        <p style="color: #7a5c48;">
            Pilih layanan terbaik untuk Anda
        </p>
    </div>


    <!-- ===================== STUDIO SERVICES ===================== -->
    <h2 style="font-family: 'Hahmlet'; color: #5a3e2b; margin-bottom: 20px;">
        Studio Services
    </h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(480px, 1fr)); gap: 25px; margin-bottom: 50px;">

        @foreach($services as $index => $s)
        <div style="background: #ffffff; border-radius: 20px; display: flex; height: 180px; overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.08);">

            <!-- IMAGE -->
            <div style="width: 35%;">
                <img src="https://source.unsplash.com/400x300/?facial"
                     style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- CONTENT -->
            <div style="width: 65%; padding: 15px; display: flex; flex-direction: column; justify-content: space-between;">
                
                <div>
                    <h3 style="font-family: 'Hahmlet'; font-size: 17px; color: #5a3e2b;">
                        {{ $s[0] }}
                    </h3>

                    <p style="font-size: 13px; color: #7a5c48;">
                        {{ \Illuminate\Support\Str::limit($s[2], 80) }}
                    </p>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: bold; color: #5a3e2b;">
                        Rp {{ $s[1] }}
                    </span>

                    <a href="{{ route('customer.booking.create', $index) }}"
                       style="background: linear-gradient(90deg, #d96b34, #f2a16b); color: white; padding: 6px 15px; border-radius: 10px; text-decoration: none; font-size: 12px;">
                        Booking
                    </a>
                </div>

            </div>

        </div>
        @endforeach

    </div>


    <!-- ===================== HOME SERVICES ===================== -->
    <h2 style="font-family: 'Hahmlet'; color: #5a3e2b; margin-bottom: 20px;">
        Home Services
    </h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(480px, 1fr)); gap: 25px;">

        @foreach($home as $i => $h)
        <div style="background: #ffffff; border-radius: 20px; display: flex; height: 180px; overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.08);">

            <!-- IMAGE -->
            <div style="width: 35%;">
                <img src="https://source.unsplash.com/400x300/?beauty,spa"
                     style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- CONTENT -->
            <div style="width: 65%; padding: 15px; display: flex; flex-direction: column; justify-content: space-between;">
                
                <div>
                    <h3 style="font-family: 'Hahmlet'; font-size: 17px; color: #5a3e2b;">
                        {{ $h[0] }}
                    </h3>

                    <p style="font-size: 13px; color: #7a5c48;">
                        {{ \Illuminate\Support\Str::limit($h[2], 80) }}
                    </p>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: bold; color: #5a3e2b;">
                        Rp {{ $h[1] }}
                    </span>

                    <a href="{{ route('customer.booking.create', $i) }}"
                       style="background: linear-gradient(90deg, #d96b34, #f2a16b); color: white; padding: 6px 15px; border-radius: 10px; text-decoration: none; font-size: 12px;">
                        Booking
                    </a>
                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection