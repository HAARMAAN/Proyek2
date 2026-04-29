@extends('layouts.customer')

@section('content')
<div style="width: 100%; max-width: 1100px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-family: 'Hanuman'; font-size: 35px; margin-bottom: 5px;">SERVICES</h1>
        <p style="font-family: 'Jost'; color: #777;">Pilih perawatan terbaik untuk kulit Anda.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(480px, 1fr)); gap: 25px;">
        @foreach($layanans as $l)
        <div style="background: #BDBDBD; border-radius: 20px; display: flex; height: 180px; overflow: hidden; box-shadow: 4px 4px 10px rgba(0,0,0,0.1);">
            <div style="width: 35%;">
                <img src="{{ asset('storage/' . $l->image) }}" style="width: 100%; height: 100%; object-fit: cover; padding: 10px; border-radius: 20px;">
            </div>
            <div style="width: 65%; padding: 15px; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h3 style="font-family: 'Hanuman'; margin: 0; font-size: 18px;">{{ $l->layanan_name }}</h3>
                    <p style="font-size: 12px; color: #444; margin-top: 5px;">{{ Str::limit($l->description, 80) }}</p>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: bold;">Rp {{ number_format($l->price, 0, ',', '.') }}</span>
                    <a href="{{ route('customer.booking.create', $l->id) }}" style="background: #F9CDA2; padding: 5px 15px; border-radius: 10px; text-decoration: none; color: black; font-size: 12px; font-weight: bold;">Booking</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection