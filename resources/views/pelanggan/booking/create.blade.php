@extends('layouts.customer')

@section('content')
<div style="background: white; padding: 40px; border-radius: 25px; box-shadow: 0px 10px 30px rgba(0,0,0,0.05); width: 100%; max-width: 800px; margin: 0 auto;">
    <h2 style="font-family: 'Erica One'; font-size: 28px; margin-bottom: 30px; color: #333; text-align: center; letter-spacing: 2px;">FORM BOOKING LAYANAN</h2>
    
    <form action="{{ route('customer.booking.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold; margin-bottom: 8px;">Pilih Layanan:</label>
            <select name="layanan_id" required style="width: 100%; padding: 12px; border-radius: 10px;">
                <option value="">-- Pilih Layanan --</option>
                @foreach($layanans as $l)
                    {{-- Gunakan old() untuk menangkap input sebelumnya, atau $layanan_id dari URL sebagai cadangan --}}
                    <option value="{{ $l->id }}" {{ (old('layanan_id', $layanan_id) == $l->id) ? 'selected' : '' }}>
                        {{ $l->layanan_name }} - Rp {{ number_format($l->price, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label style="display:block; font-family: 'Jost'; font-weight: bold; margin-bottom: 8px;">Tanggal:</label>
                <input type="date" name="booking_date" value="{{ old('booking_date') }}" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
            </div>
            <div style="flex: 1;">
                <label style="display:block; font-family: 'Jost'; font-weight: bold; margin-bottom: 8px;">Jam:</label>
                <input type="time" name="booking_time" value="{{ old('booking_time') }}" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold; margin-bottom: 8px;">Tipe Lokasi:</label>
            <select name="location_type" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                <option value="studio">🏢 Datang ke Studio</option>
                <option value="home_service">🏠 Home Service</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold; margin-bottom: 8px;">Alamat Lengkap (Jika Home Service):</label>
            <textarea name="service_address" placeholder="Kosongkan jika datang ke studio..." style="width: 100%; padding: 15px; border-radius: 12px; border: 1px solid #ddd; height: 100px; resize: none;">{{ old('service_address') }}</textarea>
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold; margin-bottom: 8px;">Metode Pembayaran:</label>
            <select name="metode_pembayaran" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                <option value="cash">💵 Cash (Bayar di Tempat)</option>
                <option value="transfer">📱 Transfer Bank</option>
            </select>
        </div>

        <button type="submit" style="width: 100%; background: #FF9E1E; color: white; padding: 18px; border: none; border-radius: 15px; font-family: 'Erica One'; font-size: 20px; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);">
            KONFIRMASI BOOKING
        </button>
    </form>
</div>
@endsection