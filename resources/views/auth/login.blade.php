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
    font-size: 32px;
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

/* LINK LUPA PASSWORD */
.forgot {
    text-align: right;
    font-size: 13px;
    margin-top: -8px;
    margin-bottom: 10px;
}

.forgot a {
    color: #7a5c48;
    transition: 0.2s;
}

.forgot a:hover {
    color: #d66a2f;
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
}

.btn-login:hover {
    background: #bf5b25;
    transform: scale(1.02);
}

/* LINK */
.link {
    margin-top: 18px;
    font-size: 14px;
    color: #7a5c48;
}

.link a {
    color: #d66a2f;
    font-weight: 500;
}

.link a:hover {
    text-decoration: underline;
}

/* BACK */
.back {
    margin-top: 22px;
    font-size: 13px;
    color: #7a5c48;
}

.back a:hover {
    color: #d66a2f;
}
</style>

<div class="login-wrapper">

<div class="login-card">

    <!-- LOGO -->
<div style="display:flex; justify-content:center; margin-bottom:18px;">
    <img src="/images/LHB.png"
         alt="Logo Luna"
         style="width:90px; height:90px; object-fit:contain;">
</div>

    <!-- TITLE -->
    <div class="title">Welcome Back</div>
    <div class="subtitle">Masuk ke akun Luna Home Beauty</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- EMAIL -->
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" class="input-field"
                   placeholder="Masukkan email"
                   value="{{ old('email') }}" required>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- PASSWORD -->
        <div class="input-group">
            <label>Kata Sandi</label>
            <input type="password" name="password" class="input-field"
                   placeholder="Masukkan kata sandi" required>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- LUPA PASSWORD -->
        <div class="forgot">
            <a href="{{ route('password.request') }}">
                Lupa kata sandi?
            </a>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn-login">
            Masuk
        </button>

        <!-- REGISTER -->
        <div class="link">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar</a>
        </div>

        <!-- BACK -->
        <div class="back">
            ← <a href="/">Kembali ke beranda</a>
        </div>

    </form>

</div>
</div>

</x-guest-layout>