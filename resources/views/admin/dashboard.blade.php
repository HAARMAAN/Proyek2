<x-app-layout>

<div style="
    padding: 25px;
    font-family: 'Poppins', sans-serif;
    background: #f4efe9;
    min-height: 100vh;
;">

    <!-- HEADER -->
    <div style="margin-bottom: 28px;">

        <h1 style="
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #4e3629;
            font-weight: 700;
        ">
            Dashboard Admin
        </h1>

        <p style="
            color: #7a5c48;
            font-size: 14px;
            margin-top: 4px;
        ">
            Ringkasan statistik dan performa bisnis Luna Beauty
        </p>

    </div>


    <!-- STATISTIK -->
    <div style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px,1fr));
        gap: 18px;
        margin-bottom: 35px;
    ">

        <!-- Pelanggan -->
        <div style="
            background: white;
            padding: 22px;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border: 1px solid #f1e3d8;
        ">

            <div style="font-size: 26px;">👤</div>

            <p style="
                font-size: 13px;
                color: #9b7b67;
                margin-top: 10px;
            ">
                Total Pelanggan
            </p>

            <h3 style="
                font-size: 28px;
                font-weight: bold;
                color: #4e3629;
                margin-top: 5px;
            ">
                {{ $totalPelanggan }}
            </h3>

        </div>

        <!-- Booking -->
        <div style="
            background: white;
            padding: 22px;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border: 1px solid #f1e3d8;
        ">

            <div style="font-size: 26px;">📅</div>

            <p style="
                font-size: 13px;
                color: #9b7b67;
                margin-top: 10px;
            ">
                Booking Menunggu
            </p>

            <h3 style="
                font-size: 28px;
                font-weight: bold;
                color: #4e3629;
                margin-top: 5px;
            ">
                {{ $bookingMenunggu }}
            </h3>

        </div>

        <!-- Selesai -->
        <div style="
            background: white;
            padding: 22px;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border: 1px solid #f1e3d8;
        ">

            <div style="font-size: 26px;">✨</div>

            <p style="
                font-size: 13px;
                color: #9b7b67;
                margin-top: 10px;
            ">
                Treatment Selesai
            </p>

            <h3 style="
                font-size: 28px;
                font-weight: bold;
                color: #4e3629;
                margin-top: 5px;
            ">
                {{ $totalBookingSelesai }}
            </h3>

        </div>

    </div>


    <!-- CONTENT -->
    <div style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px,1fr));
        gap: 22px;
    ">

        <!-- BOOKING TERBARU -->
        <div style="
            background: white;
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border: 1px solid #f1e3d8;
        ">

            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 18px;
            ">

                <h2 style="
                    font-family: 'Playfair Display', serif;
                    font-size: 19px;
                    color: #4e3629;
                    font-weight: 700;
                ">
                    Booking Terbaru
                </h2>

                <a href="{{ route('admin.booking.index') }}"
                   style="
                        color: #d66a2f;
                        font-weight: 600;
                        text-decoration: none;
                   ">
                    Lihat Semua
                </a>

            </div>

            @forelse($bookingTerbaru as $bt)

            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 14px;
                border-radius: 18px;
                background: #fcf7f2;
                margin-bottom: 10px;
            ">

                <div>

                    <p style="
                        font-weight: 600;
                        color: #4e3629;
                    ">
                        {{ $bt->user->name ?? 'User' }}
                    </p>

                    <p style="
                        font-size: 12px;
                        color: #8a6a56;
                        margin-top: 2px;
                    ">
                        {{ $bt->layanan->layanan_name ?? 'Layanan' }}
                    </p>

                </div>

                @php
                    $statusColors = [
                        'pending'              => ['bg' => '#FFF8E1', 'fg' => '#F59E0B'],
                        'waiting_confirmation' => ['bg' => '#E0F2FE', 'fg' => '#0369A1'],
                        'confirmed'            => ['bg' => '#DCFCE7', 'fg' => '#15803D'],
                        'completed'            => ['bg' => '#F3E8FF', 'fg' => '#7E22CE'],
                        'cancelled'            => ['bg' => '#FDECEC', 'fg' => '#E10303'],
                        'expired'              => ['bg' => '#F3F4F6', 'fg' => '#6B7280'],
                    ];
                    $statusLabels = \App\Models\Booking::STATUS_LABELS;
                    $sBg = $statusColors[$bt->status_booking]['bg'] ?? '#F3E3D7';
                    $sFg = $statusColors[$bt->status_booking]['fg'] ?? '#7A5C48';
                @endphp
                <span style="
                    padding: 5px 12px;
                    border-radius: 14px;
                    font-size: 11px;
                    font-weight: 600;
                    background: {{ $sBg }};
                    color: {{ $sFg }};
">
                    {{ $statusLabels[$bt->status_booking] ?? $bt->status_booking }}
                </span>

            </div>

            @empty

            <p style="color: #999;">
                Belum ada booking.
            </p>

            @endforelse

        </div>


        <!-- LAYANAN -->
        <div style="
            background: white;
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border: 1px solid #f1e3d8;
            text-align: center;
        ">

            <h2 style="
                font-family: 'Playfair Display', serif;
                font-size: 19px;
                color: #4e3629;
                margin-bottom: 18px;
                font-weight: 700;
            ">
                Informasi Layanan
            </h2>

            <div style="font-size: 38px;">✨</div>

            <p style="
                margin-top: 12px;
                font-weight: bold;
                color: #4e3629;
                font-size: 16px;
            ">
                Total {{ $totalLayanan }} Layanan Aktif
            </p>

            <p style="
                font-size: 13px;
                color: #8a6a56;
                margin-top: 6px;
            ">
                Semua layanan tersedia untuk dibooking pelanggan
            </p>

            <a href="{{ route('admin.layanan.index') }}"
               style="
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 20px;
                    border-radius: 14px;
                    background: linear-gradient(90deg,#d66a2f,#f2a16b);
                    color: white;
                    text-decoration: none;
                    font-weight: 600;
                    box-shadow: 0 4px 12px rgba(214,106,47,0.25);
               ">

                Kelola Layanan

            </a>

        </div>

    </div>

</div>

</x-app-layout>