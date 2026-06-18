<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\CheckoutController;
use App\Http\Controllers\Web\Frontend\TourController;
use App\Http\Controllers\Web\Frontend\DormBookingController;
use App\Http\Controllers\Web\Frontend\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tour-details/{slug}', [TourController::class, 'details'])->name('tour-detail');
Route::get('/travels',  [TourController::class, 'travels'])->name('travels.index');
Route::get('/training', [TourController::class, 'training'])->name('training.index');
Route::get('/souvenirs', [TourController::class, 'souvenirs'])->name('souvenirs.index');
Route::get('/dormatory', [TourController::class, 'dormatory'])->name('dormatory.index');
Route::get('/checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout');

Route::post('/dorm-booking', [DormBookingController::class, 'store'])->name('dorm.booking.store');
// Route::get('/dashboard', [DashBoardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Guest only
Route::middleware('guest')->prefix('user')->name('user.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'registerPage'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});
// Auth only
Route::middleware('auth')->prefix('user')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [AuthController::class, 'profileUpdate'])->name('user.profile.update');
    Route::post('/profile/password', [AuthController::class, 'passwordUpdate'])->name('user.password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
