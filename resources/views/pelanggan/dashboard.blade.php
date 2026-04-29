@extends('layouts.customer')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; min-height: 80vh; gap: 30px; padding: 20px 0;">
    
    <div style="text-align: center;">
        <div style="font-family: 'Erica One'; font-size: 36px; color: #333;">Selamat Datang, {{ $user->name }}</div>
        <div style="font-family: 'Jost'; font-size: 20px; color: #666; mt-2;">Kelola profil dan riwayat treatment Anda</div>
    </div>

    <div style="width: 100%; max-width: 700px; background: #D9D9D9; border-radius: 25px; box-shadow: 10px 10px 20px rgba(0,0,0,0.1); overflow: hidden; padding-bottom: 30px;">
        <div style="padding: 25px; font-family: 'Erica One'; font-size: 28px; text-align: center; border-bottom: 2px solid rgba(0,0,0,0.05); margin-bottom: 20px;">
            INFORMASI PRIBADI
        </div>
        
        <div style="padding: 0 60px; font-family: 'Hanuman'; font-size: 18px; line-height: 1.6;">
            <p style="margin-bottom: 15px;"><strong>Nama Lengkap:</strong><br>{{ $user->name }}</p>
            <p style="margin-bottom: 15px;"><strong>Email:</strong><br>{{ $user->email }}</p>
            <p style="margin-bottom: 0;"><strong>WhatsApp:</strong><br>{{ $user->whatsapp_number ?? '-' }}</p>
        </div>
    </div>

    <div style="width: 100%; max-width: 700px; background: #D9D9D9; border-radius: 25px; box-shadow: 10px 10px 20px rgba(0,0,0,0.1); padding-bottom: 30px;">
        <div style="padding: 25px; font-family: 'Erica One'; font-size: 28px; text-align: center; border-bottom: 2px solid rgba(0,0,0,0.05); margin-bottom: 20px;">
            STATISTIK ANDA
        </div>
        
        <div style="display: flex; justify-content: space-around; text-align: center; font-family: 'Hanuman'; padding: 10px 20px;">
            <div>
                <div style="font-size: 24px; font-weight: bold;">{{ $myBookings->count() }}</div>
                <div style="font-size: 14px; color: #555;">Total Booking</div>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: bold;">{{ $user->bintang_loyalitas ?? 0 }} ⭐</div>
                <div style="font-size: 14px; color: #555;">Bintang Loyalitas</div>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: bold;">{{ $user->total_kunjungan ?? 0 }}</div>
                <div style="font-size: 14px; color: #555;">Total Kunjungan</div>
            </div>
        </div>
    </div>

</div>
@endsection