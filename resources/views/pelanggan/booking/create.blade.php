@extends('layouts.customer')

@section('content')
<div style="position: absolute; left: 542px; top: 50px; width: 693px; background: white; padding: 30px; border-radius: 20px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
    <h2 style="font-family: 'Erica One'; font-size: 25px; margin-bottom: 20px; color: #333;">FORM BOOKING LAYANAN</h2>
    
    <form action="{{ route('customer.booking.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold;">Pilih Layanan:</label>
            <select name="layanan_id" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid {{ $errors->has('layanan_id') ? 'red' : '#ccc' }};">
                <option value="">-- Pilih Layanan --</option>
                @foreach($layanans as $l)
                    <option value="{{ $l->id }}" {{ old('layanan_id') == $l->id ? 'selected' : '' }}>
                        {{ $l->layanan_name }} - Rp {{ number_format($l->price, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            @error('layanan_id') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label style="display:block; font-family: 'Jost'; font-weight: bold;">Tanggal:</label>
                <input type="date" name="booking_date" value="{{ old('booking_date') }}" required 
                    style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid {{ $errors->has('booking_date') ? 'red' : '#ccc' }};">
                @error('booking_date') <small style="color: red; display: block; margin-top: 5px;">{{ $message }}</small> @enderror
            </div>
            
            <div style="flex: 1;">
                <label style="display:block; font-family: 'Jost'; font-weight: bold;">Jam:</label>
                <input type="time" name="booking_time" value="{{ old('booking_time') }}" required 
                    style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid {{ $errors->has('booking_time') ? 'red' : '#ccc' }};">
                @error('booking_time') <small style="color: red; display: block; margin-top: 5px;">{{ $message }}</small> @enderror
            </div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold;">Tipe Lokasi:</label>
            <select name="location_type" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid {{ $errors->has('location_type') ? 'red' : '#ccc' }};">
                <option value="studio" {{ old('location_type') == 'studio' ? 'selected' : '' }}>Datang ke Studio</option>
                <option value="home_service" {{ old('location_type') == 'home_service' ? 'selected' : '' }}>Home Service</option>
            </select>
            @error('location_type') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold;">Alamat Lengkap (Jika Home Service):</label>
            <textarea name="service_address" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">{{ old('service_address') }}</textarea>
            @error('service_address') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-family: 'Jost'; font-weight: bold;">Metode Pembayaran:</label>
            <select name="metode_pembayaran" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid {{ $errors->has('metode_pembayaran') ? 'red' : '#ccc' }};">
                <option value="cash" {{ old('metode_pembayaran') == 'cash' ? 'selected' : '' }}>Cash (Bayar di Tempat)</option>
                <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
            </select>
            @error('metode_pembayaran') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <button type="submit" style="width: 100%; background: #E67E22; color: white; padding: 15px; border: none; border-radius: 10px; font-family: 'Erica One'; cursor: pointer;">
            KONFIRMASI BOOKING
        </button>
    </form>
</div>
@endsection