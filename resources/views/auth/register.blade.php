<x-guest-layout> 

<link href="https://fonts.bunny.net/css?family=playfair-display:600,700|poppins:400,500,600" rel="stylesheet" />

<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4efe9;
}

/* WRAPPER */
.register-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* CARD */
.register-card {
    background: #ffffff;
    padding: 40px 35px;
    border-radius: 22px;
    width: 100%;
    max-width: 450px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    text-align: center;
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
    font-size: 28px;
    color: #4e3629;
    margin-bottom: 5px;
}

/* SUBTITLE */
.subtitle {
    color: #d66a2f;
    font-size: 14px;
    margin-bottom: 25px;
    font-weight: 500;
}

/* INPUT GROUP */
.input-group {
    text-align: left;
    margin-bottom: 15px;
}

.input-group label {
    font-size: 13px;
    color: #6d5244;
    font-weight: 500;
}

/* INPUT */
.input-field,
.textarea-field {
    width: 100%;
    padding: 14px 16px;
    border-radius: 14px;
    border: 1.5px solid #e8d8c8;
    margin-top: 6px;
    outline: none;
    font-size: 14px;
    color: #4e3629;
    background-color: #fff;
    transition: all 0.25s ease;
}

/* PLACEHOLDER */
.input-field::placeholder,
.textarea-field::placeholder {
    color: #b7a79a;
}

/* FOCUS */
.input-field:focus,
.textarea-field:focus {
    border-color: #d66a2f;
    box-shadow: 0 0 0 3px rgba(214, 106, 47, 0.15);
}

/* TEXTAREA */
.textarea-field {
    resize: none;
}

/* BUTTON */
.btn-register {
    width: 100%;
    background: #d66a2f;
    color: white;
    padding: 13px;
    border-radius: 30px;
    border: none;
    font-weight: 600;
    margin-top: 18px;
    transition: 0.3s;
}

.btn-register:hover {
    background: #bf5b25;
}

/* LINK */
.link {
    margin-top: 15px;
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
    margin-top: 20px;
    font-size: 13px;
    color: #7a5c48;
}
</style>

<div class="register-wrapper">

<div class="register-card">

    <!-- LOGO -->
<div style="display:flex; justify-content:center; margin-bottom:18px;">
    <img src="/images/LHB.png"
         alt="Logo Luna"
         style="width:90px; height:90px; object-fit:contain;">
</div>

    <!-- TITLE -->
    <div class="title">Buat Akun</div>

    <!-- SUBTITLE -->
    <div class="subtitle">
        Daftar ke Luna Home Beauty
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NAMA -->
        <div class="input-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="input-field"
                   placeholder="Masukkan nama lengkap"
                   value="{{ old('name') }}" required>
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- WHATSAPP -->
        <div class="input-group">
            <label>Nomor WhatsApp</label>
            <input type="text" name="whatsapp_number" class="input-field"
                   placeholder="08xxxxxxxxxx"
                   value="{{ old('whatsapp_number') }}" required>
            <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-1" />
        </div>

        <!-- ALAMAT -->
        <div class="input-group">
            <label>Alamat Lengkap</label>
            <textarea name="alamat" class="textarea-field"
                      placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-1" />
        </div>

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

        <!-- KONFIRMASI -->
        <div class="input-group">
            <label>Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" class="input-field"
                   placeholder="Ulangi kata sandi" required>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn-register">
            Daftar
        </button>

        <!-- LOGIN -->
        <div class="link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk</a>
        </div>

        <!-- BACK -->
        <div class="back">
            ← <a href="/" style="color:#7a5c48;">Kembali ke beranda</a>
        </div>

    </form>

</div>
</div>

</x-guest-layout>