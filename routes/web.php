    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\Admin\LayananController;
    use App\Http\Controllers\Admin\BookingController as AdminBooking;
    use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
    use App\Http\Controllers\Pelanggan\PelangganDashboardController;
    use App\Http\Controllers\Pelanggan\BookingController as PelangganBooking;

    Route::get('/', function () {
        return view('home');
    });

    // Pintu Tengah (Switcher)
    Route::get('/dashboard', function () {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            return $user->role === 'admin' 
                ? redirect()->route('admin.dashboard') 
                : redirect()->route('customer.dashboard');
        } elseif (Auth::guard('pelanggan')->check()) {
            return redirect()->route('customer.dashboard');
        }
        return redirect()->route('login');
    })->middleware(['auth:web,pelanggan', 'verified'])->name('dashboard');

    // --- GROUP ADMIN ---
    // Hanya boleh diakses kalau login lewat tabel users DAN role-nya admin (opsional tambahkan middleware role)
    Route::middleware(['auth:web', 'verified'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::resource('layanan', LayananController::class);
        Route::get('/booking', [AdminBooking::class, 'index'])->name('booking.index');
        Route::patch('/booking/{id}/status', [AdminBooking::class, 'updateStatus'])->name('booking.updateStatus');
        
        Route::resource('pelanggan', \App\Http\Controllers\Admin\PelangganController::class);
        Route::get('/laporan', [AdminDashboard::class, 'laporan'])->name('laporan.index');
        Route::get('/pengaturan', [AdminDashboard::class, 'index'])->name('pengaturan.index');
    });

    // --- GROUP PELANGGAN ---
    // KRUSIAL: Izinkan guard 'web' masuk sini karena Owi ada di tabel users
    Route::middleware(['auth:web,pelanggan', 'verified'])->prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [PelangganDashboardController::class, 'index'])->name('dashboard');
        Route::get('/riwayat-booking', [PelangganDashboardController::class, 'riwayatBooking'])->name('riwayat');
        Route::get('/loyalitas', [PelangganDashboardController::class, 'loyalitas'])->name('loyalitas');
        
        Route::get('/booking/create', [PelangganBooking::class, 'create'])->name('booking.create');
        Route::post('/booking', [PelangganBooking::class, 'store'])->name('booking.store');
    });

    Route::middleware(['auth:web,pelanggan'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';