@extends('layouts.customer')

@section('content')
    <div class="welcome-text">Riwayat Booking</div>
    <div style="position: absolute; width: 450px; left: 542px; top: 95px; font-family: 'Jost'; font-size: 20px; text-align: center;">
        Daftar pesanan perawatan Luna Home Beauty Anda
    </div>

    <div style="position: absolute; width: 750px; height: 600px; left: 542px; top: 157px; background: #D9D9D9; box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.25); border-radius: 20px; padding: 25px; overflow-y: auto;">
        
        <div style="font-family: 'Erica One'; font-size: 28px; text-align: center; margin-bottom: 15px;">
            STATUS PESANAN
        </div>
        
        <div style="width: 100%; border: 1px solid #000000; margin-bottom: 20px;"></div>

        <table style="width: 100%; border-collapse: collapse; font-family: 'Hanuman'; font-size: 16px;">
            <thead>
                <tr style="border-bottom: 2px solid #000000; text-align: left;">
                    <th style="padding: 10px;">Tanggal</th>
                    <th style="padding: 10px;">Layanan</th>
                    <th style="padding: 10px;">Tipe</th>
                    <th style="padding: 10px; text-align: center;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr style="border-bottom: 1px solid #999;">
                    <td style="padding: 15px 10px;">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</td>
                    <td style="padding: 15px 10px;">{{ $booking->layanan->layanan_name }}</td>
                    <td style="padding: 15px 10px;">
                        {{ $booking->location_type == 'home_service' ? '🏠 Home' : '🏢 Studio' }}
                    </td>
                    <td style="padding: 15px 10px; text-align: center;">
                        @php
                            $color = match($booking->status_booking) {
                                'pending' => '#F9CDA2',
                                'confirmed' => '#87CEEB',
                                'completed' => '#90EE90',
                                'cancelled' => '#FFB6C1',
                                default => '#9C9C9C'
                            };
                        @endphp
                        <span style="background: {{ $color }}; padding: 5px 12px; border-radius: 12px; font-size: 12px; font-weight: bold; text-transform: uppercase;">
                            {{ $booking->status_booking }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 100px;">Belum ada riwayat booking.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="position: absolute; width: 267px; height: 94px; left: 1025px; top: 772px; background: #9C9C9C; border-radius: 15px; text-align: center; padding-top: 10px;">
        <div style="font-family: 'Hanuman'; font-weight: 700; font-size: 18px;">Bintang Loyalitas</div>
        <div style="font-family: 'Metal Mania'; font-size: 30px;">{{ $user->bintang_loyalitas }} ⭐</div>
    </div>
@endsection