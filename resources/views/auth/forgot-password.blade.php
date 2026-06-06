<x-guest-layout>
<link href="https://fonts.bunny.net/css?family=playfair-display:600,700|poppins:400,500,600" rel="stylesheet" />

<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4efe9;
}

/* WRAPPER */
.login-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* CARD */
.login-card {
    background: #ffffff;
    padding: 45px 35px;
    border-radius: 24px;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    text-align: center;
    transition: 0.3s;
}

.login-card:hover {
    transform: translateY(-3px);
}

/* LOGO */
.logo {
    display: flex;
    justify-content: center;
    margin-bottom: 18px;
}

.logo img {
    width: 90px;
    height: 90px;
    object-fit: contain;
}

/* TITLE */
.title {
    font-family: 'Playfair Display', serif;
    font-size: 30px;
    color: #4e3629;
    margin-bottom: 6px;
}

.subtitle {
    color: #d66a2f;
    font-size: 14px;
    margin-bottom: 28px;
}

/* INPUT */
.input-group {
    text-align: left;
    margin-bottom: 18px;
}

.input-group label {
    font-size: 13px;
    color: #6d5244;
    font-weight: 500;
}

.input-field {
    width: 100%;
    padding: 13px 14px;
    border-radius: 12px;
    border: 1px solid #e7d8c9;
    margin-top: 6px;
    outline: none;
    font-size: 14px;
    transition: 0.2s;
}

.input-field::placeholder {
    color: #b7a79a;
}

.input-field:focus {
    border-color: #d66a2f;
    box-shadow: 0 0 0 2px rgba(214,106,47,0.15);
}

/* BUTTON */
.btn-login {
    width: 100%;
    background: #d66a2f;
    color: white;
    padding: 13px;
    border-radius: 30px;
    border: none;
    font-weight: 600;
    margin-top: 10px;
    transition: 0.3s;
    letter-spacing: 0.5px;
    cursor: pointer;
}

.btn-login:hover {
    background: #bf5b25;
    transform: scale(1.02);
}

/* BACK */
.back {
    margin-top: 22px;
    font-size: 13px;
    color: #7a5c48;
}

.back a {
    color: #7a5c48;
    text-decoration: none;
    transition: 0.2s;
}

.back a:hover {
    color: #d66a2f;
}

/* ALERT STATUS */
.alert-status {
    background-color: #fcf3eb;
    border: 1px solid #f5dcd0;
    color: #c4571e;
    padding: 12px 16px;
    border-radius: 12px;
    font-size: 13.5px;
    text-align: left;
    margin-bottom: 20px;
    line-height: 1.5;
}
</style>

<div class="login-wrapper">
    <div class="login-card">
        
        <!-- LOGO -->
        <div style="display:flex; justify-content:center; margin-bottom:18px;">
            <img src="/images/LHB.png" alt="Logo Luna" style="width:90px; height:90px; object-fit:contain;">
        </div>

        <!-- TITLE -->
        <div class="title">Lupa Kata Sandi</div>
        <div class="subtitle">Kami akan mengirimkan link atur ulang kata sandi ke email Anda</div>

        @if (session('status'))
            <div class="alert-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- EMAIL -->
            <div class="input-group">
                <label>Alamat Email</label>
                <input type="email" name="email" class="input-field"
                       placeholder="Masukkan email terdaftar"
                       value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-login">
                Kirim Tautan Atur Ulang
            </button>

            <!-- BACK -->
            <div class="back">
                ← <a href="{{ route('login') }}">Kembali ke halaman masuk</a>
            </div>

        </form>

    </div>
</div>
</x-guest-layout>