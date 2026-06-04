@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; min-height: 80vh; gap: 35px; padding: 30px 0; background-color: #f7efe5; font-family: 'Jost', sans-serif;">
    
    <!-- HEADER -->
    <div style="text-align: center;">
        <div style="font-family: 'Hahmlet'; font-size: 38px; color: #5a3e2b; font-weight: 700;">
            Selamat Datang, {{ $user->name }}
        </div>
        <div style="font-size: 18px; color: #7a5c48; margin-top: 6px;">
            Kelola profil dan riwayat treatment Anda dengan mudah
        </div>
        @auth
        <div style="margin-top: 22px;">
            <a href="{{ route('home') }}" 
               style="display: inline-block; background: linear-gradient(90deg, #d96b34, #f2a16b); color: white; padding: 12px 30px; border-radius: 30px; font-weight: 600; text-decoration: none; box-shadow: 0 4px 15px rgba(217, 107, 52, 0.2); transition: 0.3s; font-family: 'Poppins', sans-serif;"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(217, 107, 52, 0.35)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(217, 107, 52, 0.2)';">
                Kembali ke Layanan
            </a>
        </div>
        @endauth
    </div>

    <!-- INFORMASI PRIBADI -->
    <div style="width: 100%; max-width: 700px; background: #ffffff; border-radius: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); overflow: hidden;">
        
        <div style="padding: 20px; font-family: 'Hahmlet'; font-size: 22px; text-align: center; background: linear-gradient(90deg, #d96b34, #f2a16b); color: white;">
            Informasi Pribadi
        </div>
        
        <div style="padding: 30px 60px; font-size: 16px; color: #5a3e2b; line-height: 1.8;">
            <p style="margin-bottom: 18px;">
                <span style="font-weight: 600; color: #7a5c48;">Nama Lengkap</span><br>
                {{ $user->name }}
            </p>

            <p style="margin-bottom: 18px;">
                <span style="font-weight: 600; color: #7a5c48;">Email</span><br>
                {{ $user->email }}
            </p>

            <p>
                <span style="font-weight: 600; color: #7a5c48;">Nomor WhatsApp</span><br>
                {{ $user->whatsapp_number ?? '-' }}
            </p>
        </div>
    </div>

    <!-- STATISTIK -->
    <div style="width: 100%; max-width: 700px; background: #ffffff; border-radius: 25px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); overflow: hidden;">
        
        <div style="padding: 20px; font-family: 'Hahmlet'; font-size: 22px; text-align: center; background: linear-gradient(90deg, #d96b34, #f2a16b); color: white;">
            Statistik Anda
        </div>
        
        <div style="display: flex; justify-content: space-around; text-align: center; padding: 25px 20px; color: #5a3e2b;">
            
            <div>
                <div style="font-size: 28px; font-weight: bold;">{{ $myBookings->count() }}</div>
                <div style="font-size: 14px; color: #7a5c48; margin-top: 5px;">Total Booking</div>
            </div>

            <div>
                <div style="font-size: 28px; font-weight: bold;">{{ $user->bintang_loyalitas ?? 0 }} ⭐</div>
                <div style="font-size: 14px; color: #7a5c48; margin-top: 5px;">Bintang Loyalitas</div>
            </div>

            <div>
                <div style="font-size: 28px; font-weight: bold;">{{ $user->total_kunjungan ?? 0 }}</div>
                <div style="font-size: 14px; color: #7a5c48; margin-top: 5px;">Total Kunjungan</div>
            </div>

        </div>
    </div>

</div>
@endsection