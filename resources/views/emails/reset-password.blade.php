<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi - Luna Home Beauty</title>
    <style>
        body {
            font-family: 'Poppins', Helvetica, Arial, sans-serif;
            background-color: #f4efe9;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            background-color: #f4efe9;
            padding: 30px 0;
        }
        .container {
            max-width: 580px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #4e3629;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .content {
            padding: 40px 30px;
            color: #55433c;
            line-height: 1.6;
        }
        .content h2 {
            color: #4e3629;
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .content p {
            font-size: 15px;
            margin-bottom: 25px;
        }
        .btn-wrapper {
            text-align: center;
            margin: 35px 0;
        }
        .btn {
            background-color: #d66a2f;
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 15px;
            display: inline-block;
            box-shadow: 0 5px 15px rgba(214, 106, 47, 0.3);
            transition: background-color 0.2s;
        }
        .btn:hover {
            background-color: #bf5b25;
        }
        .footer {
            background-color: #faf7f2;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #e7d8c9;
            font-size: 13px;
            color: #8c7365;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h1>Luna Home Beauty</h1>
            </div>
            <div class="content">
                <h2>Halo,</h2>
                <p>Kami menerima permintaan untuk mengatur ulang kata sandi akun Luna Home Beauty Anda.</p>
                <p>Silakan klik tombol di bawah ini untuk menginput kata sandi yang baru:</p>
                <div class="btn-wrapper">
                    <a href="{{ $reset_url }}" class="btn" target="_blank">Atur Ulang Kata Sandi</a>
                </div>
                <p>Jika tombol di atas tidak berfungsi, Anda juga dapat menyalin dan menempelkan tautan berikut ke dalam browser Anda:</p>
                <p style="word-break: break-all; font-size: 13px; color: #d66a2f;"><a href="{{ $reset_url }}" style="color: #d66a2f;">{{ $reset_url }}</a></p>
                <p>Tautan ini hanya akan aktif selama 60 menit. Jika Anda tidak merasa mengajukan permintaan ini, silakan abaikan email ini dan kata sandi Anda tidak akan berubah.</p>
            </div>
            <div class="footer">
                <p>Luna Home Beauty &copy; 2026. All rights reserved.</p>
                <p>Hubungi kami melalui WhatsApp jika Anda mengalami kesulitan.</p>
            </div>
        </div>
    </div>
</body>
</html>
