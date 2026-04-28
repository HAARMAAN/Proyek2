<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat mendaftarkan API rute untuk aplikasi Anda.
| Rute ini tidak terkena proteksi CSRF, sehingga Midtrans bisa mengirim data.
|
*/

// Endpoint untuk menerima notifikasi otomatis dari Midtrans
Route::post('/midtrans-callback', [WebhookController::class, 'handler']);