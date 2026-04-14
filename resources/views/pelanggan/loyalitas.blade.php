@extends('layouts.customer')

@section('content')
    <div class="welcome-text">Bintang Loyalitas</div>
    <div style="position: absolute; width: 450px; left: 542px; top: 95px; font-family: 'Jost'; font-size: 20px; text-align: center;">
        Kumpulkan bintang dan dapatkan treatment gratis!
    </div>

    <div style="position: absolute; width: 693px; height: 300px; left: 542px; top: 157px; background: #D9D9D9; box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.25); border-radius: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        
        <div style="font-family: 'Erica One'; font-size: 30px; margin-bottom: 10px;">TOTAL BINTANG ANDA</div>
        
        <div style="font-size: 80px; filter: drop-shadow(0px 4px 4px rgba(0,0,0,0.25));">
            ⭐ <span style="font-family: 'Metal Mania'; color: #000;">{{ $user->bintang_loyalitas }}</span>
        </div>
        
        <div style="font-family: 'Hanuman'; font-size: 18px; color: #333; margin-top: 10px;">
            Anda telah melakukan <strong>{{ $user->total_kunjungan ?? 0 }}</strong> kali kunjungan
        </div>
    </div>

    <div style="position: absolute; width: 693px; height: 380px; left: 542px; top: 480px; background: #D9D9D9; box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.25); border-radius: 20px; padding: 25px;">
        <div style="font-family: 'Erica One'; font-size: 25px; text-align: center; margin-bottom: 20px;">Cara Kerja Program</div>
        
        <div style="width: 100%; border: 1px solid #000; margin-bottom: 15px;"></div>

        @foreach($rewards as $reward)
        <div style="display: flex; justify-content: space-between; align-items: center; background: #9C9C9C; margin-bottom: 10px; padding: 15px; border-radius: 15px; font-family: 'Hanuman';">
            <div style="font-weight: bold; font-size: 18px;">
                {{ $reward['hadiah'] }}
            </div>
            <div style="background: #F9CDA2; padding: 5px 15px; border-radius: 20px; font-weight: bold;">
                {{ $reward['bintang'] }} ⭐
            </div>
        </div>
        @endforeach

        <p style="font-family: 'Jost'; font-size: 14px; text-align: center; margin-top: 20px; color: #555;">
            *Tunjukkan halaman ini ke admin saat melakukan pembayaran untuk klaim reward.
        </p>
    </div>
@endsection