<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\CheckoutController;
use App\Http\Controllers\Web\Frontend\TourController;
use App\Http\Controllers\Web\Frontend\DormBookingController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
