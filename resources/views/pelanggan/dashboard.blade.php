@extends('layouts.customer')

@section('content')
    <div class="welcome-text">Selamat Datang, {{ $user->name }}</div>
    <div style="position: absolute; width: 340px; left: 542px; top: 95px; font-family: 'Jost'; font-size: 20px; text-align: center;">Kelola profil dan riwayat treatment Anda</div>

    <div style="position: absolute; width: 693px; height: 366px; left: 542px; top: 180px; background: #D9D9D9; border-radius: 20px; box-shadow: 10px 10px 4px rgba(0,0,0,0.25);">
        <div style="padding: 30px; font-family: 'Erica One'; font-size: 30px; text-align: center;">INFORMASI PRIBADI</div>
        
        <div style="margin-left: 60px; font-family: 'Hanuman'; font-size: 20px;">
            <p><strong>Nama Lengkap:</strong><br>{{ $user->name }}</p>
            <p><strong>Email:</strong><br>{{ $user->email }}</p>
            <p><strong>WhatsApp:</strong><br>{{ $user->whatsapp_number ?? '-' }}</p>
        </div>
    </div>

    <div style="position: absolute; width: 693px; height: 344px; left: 542px; top: 570px; background: #D9D9D9; border-radius: 20px; box-shadow: 10px 10px 4px rgba(0,0,0,0.25);">
        <div style="padding: 20px; font-family: 'Erica One'; font-size: 30px; text-align: center;">STATISTIK ANDA</div>
        <div style="text-align: center; font-family: 'Hanuman'; font-size: 18px;">
            <p>Total Booking: {{ $myBookings->count() }}</p>
            
            <p>Bintang Loyalitas: {{ $user->bintang_loyalitas ?? 0 }} ⭐</p>
            <p>Total Kunjungan: {{ $user->total_kunjungan ?? 0 }}</p>
            </div>
    </div>
@endsection