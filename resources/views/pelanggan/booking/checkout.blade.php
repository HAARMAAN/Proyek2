@extends('layouts.customer')

@section('content')
<div style="background: #fdf2f2; min-height: 80vh; padding: 50px 20px;">
    <div style="max-width: 450px; margin: 0 auto; background: white; padding: 40px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); text-align: center;">
        
        <div style="width: 80px; height: 80px; background: #FFF3E0; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#E67E22" viewBox="0 0 256 256"><path d="M230.14,70.54l-112-48a8,8,0,0,0-6.28,0l-112,48A8,8,0,0,0,0,77.87V178.13a8,8,0,0,0,4.86,7.33l112,48a8,8,0,0,0,6.28,0l112-48a8,8,0,0,0,4.86-7.33V77.87A8,8,0,0,0,230.14,70.54ZM120,41.74l94,40.29L120,122.31,26,82.03ZM16,95.34l96,41.14v82.78l-96-41.14Zm112,123.92V136.48l96-41.14v82.78Z"></path></svg>
        </div>

        <h2 style="font-family: 'Erica One', cursive; color: #E67E22; margin-bottom: 10px; font-size: 28px;">CHECKOUT</h2>
        <p style="font-family: 'Jost', sans-serif; color: #7f8c8d; margin-bottom: 30px; line-height: 1.5;">Hampir selesai! Silakan selesaikan pembayaran untuk mengamankan jadwal treatment kamu.</p>
        
        <div style="background: #FFFBF0; border: 2px dashed #FFE0B2; padding: 25px; border-radius: 16px; margin-bottom: 30px;">
            <span style="display:block; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #A88B6E; margin-bottom: 5px;">Total Tagihan</span>
            <strong style="font-size: 32px; color: #2C3E50; font-family: 'Jost';">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong>
            <hr style="border: 0; border-top: 1px solid #FFE0B2; margin: 15px 0;">
            <p style="font-size: 12px; color: #95a5a6; margin: 0;">Order ID: {{ $booking->order_id ?? 'LUNA-'.$booking->id }}</p>
        </div>

        <button id="pay-button" style="width: 100%; background: #E67E22; color: white; padding: 18px; border: none; border-radius: 12px; font-family: 'Jost'; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);">
            BAYAR SEKARANG
        </button>

        <p style="margin-top: 20px; font-size: 12px; color: #bdc3c7;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 256 256" style="vertical-align: middle;"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg>
            Pembayaran aman & terenkripsi oleh Midtrans
        </p>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href = "{{ route('customer.riwayat') }}?status=success";
            },
            onPending: function(result){
                window.location.href = "{{ route('customer.riwayat') }}?status=pending";
            },
            onError: function(result){
                alert("Yah, pembayaran gagal. Coba lagi ya!");
            }
        });
    };
</script>
@endsection