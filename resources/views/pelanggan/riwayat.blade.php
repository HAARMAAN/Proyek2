@extends('layouts.customer')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 950px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-family: 'Hanuman'; font-weight: 700; font-size: 35px; margin: 0; text-transform: uppercase;">Riwayat Booking</h1>
        <p style="font-family: 'Jost'; font-size: 18px; color: #666; margin-top: 10px;">Daftar pesanan perawatan Luna Home Beauty Anda</p>
    </div>

    <div style="width: 100%; background: white; border-radius: 30px; padding: 45px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #eee;">
        <div style="font-family: 'Erica One'; font-size: 26px; text-align: center; margin-bottom: 35px; color: #333; letter-spacing: 1px;">STATUS PESANAN</div>
        
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-family: 'Hanuman';">
                <thead>
                    <tr style="border-bottom: 3px solid #F9CDA2; text-align: left;">
                        <th style="padding: 15px; font-size: 14px; text-transform: uppercase; color: #777;">Tanggal</th>
                        <th style="padding: 15px; font-size: 14px; text-transform: uppercase; color: #777;">Layanan</th>
                        <th style="padding: 15px; font-size: 14px; text-transform: uppercase; color: #777;">Lokasi</th>
                        <th style="padding: 15px; font-size: 14px; text-transform: uppercase; color: #777; text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr style="border-bottom: 1px solid #f2f2f2;">
                        <td style="padding: 20px 15px; font-size: 16px;">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                        <td style="padding: 20px 15px; font-size: 18px; font-weight: 700; color: #222;">{{ $booking->layanan->layanan_name }}</td>
                        <td style="padding: 20px 15px; font-size: 16px;">
                            {{ $booking->location_type == 'home_service' ? '🏠 Home' : '🏢 Studio' }}
                        </td>
                        <td style="padding: 20px 15px; text-align: center;">
                            @php
                                $statusColor = match($booking->status_booking) {
                                    'pending' => '#FFD180',
                                    'confirmed' => '#B3E5FC',
                                    'completed' => '#C8E6C9',
                                    'cancelled' => '#FFCDD2',
                                    default => '#F5F5F5'
                                };
                            @endphp
                            <span style="background: {{ $statusColor }}; padding: 8px 16px; border-radius: 12px; font-size: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px;">
                                {{ $booking->status_booking }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 100px; color: #aaa; font-style: italic;">Belum ada riwayat booking.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 30px; background: #9C9C9C; padding: 15px 30px; border-radius: 20px; display: flex; align-items: center; gap: 15px; color: white;">
        <span style="font-family: 'Hanuman'; font-weight: 700;">Bintang Loyalitas:</span>
        <span style="font-family: 'Metal Mania'; font-size: 24px;">{{ $user->bintang_loyalitas }} ⭐</span>
    </div>
</div>
@endsection