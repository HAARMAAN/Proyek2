@extends('layouts.customer')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 800px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-family: 'Hanuman'; font-weight: 700; font-size: 35px; margin: 0; text-transform: uppercase;">Bintang Loyalitas</h1>
        <p style="font-family: 'Jost'; font-size: 18px; color: #666; margin-top: 10px;">Kumpulkan bintang dan dapatkan treatment gratis!</p>
    </div>

    <div style="width: 100%; background: #D9D9D9; padding: 50px 30px; border-radius: 30px; box-shadow: 8px 8px 0px rgba(0,0,0,0.1); border: 1px solid #ccc; text-align: center; margin-bottom: 40px;">
        <div style="font-family: 'Erica One'; font-size: 24px; color: #333; margin-bottom: 20px; letter-spacing: 2px;">TOTAL BINTANG ANDA</div>
        
        <div style="font-size: 100px; margin: 20px 0; filter: drop-shadow(0px 4px 4px rgba(0,0,0,0.1));">
            ⭐ <span style="font-family: 'Metal Mania'; color: #000;">{{ $user->bintang_loyalitas }}</span>
        </div>
        
        <div style="font-family: 'Hanuman'; font-size: 18px; color: #444; border-top: 1px solid #bcbcbc; display: inline-block; padding-top: 15px; margin-top: 10px;">
            Anda telah melakukan <strong>{{ $user->total_kunjungan ?? 0 }}</strong> kali kunjungan
        </div>
    </div>

    <div style="width: 100%; background: white; border-radius: 25px; padding: 40px; border: 1px solid #ddd; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <div style="font-family: 'Erica One'; font-size: 22px; text-align: center; margin-bottom: 30px; color: #333;">CARA KERJA PROGRAM</div>
        
        <div style="display: flex; flex-direction: column; gap: 15px;">
            @foreach($rewards as $reward)
            <div style="display: flex; justify-content: space-between; align-items: center; background: #fdfdfd; padding: 20px; border-radius: 15px; border: 1px solid #eee; border-left: 6px solid #FF9E1E;">
                <div style="font-family: 'Hanuman'; font-weight: 700; font-size: 18px; color: #333;">{{ $reward['hadiah'] }}</div>
                <div style="background: #F9CDA2; padding: 8px 22px; border-radius: 20px; font-family: 'Jost'; font-weight: 900; font-size: 18px;">
                    {{ $reward['bintang'] }} ⭐
                </div>
            </div>
            @endforeach
        </div>

        <p style="font-family: 'Jost'; font-size: 14px; text-align: center; margin-top: 30px; color: #999; font-style: italic;">
            *Tunjukkan halaman ini ke admin saat melakukan pembayaran untuk klaim reward.
        </p>
    </div>
</div>
@endsection