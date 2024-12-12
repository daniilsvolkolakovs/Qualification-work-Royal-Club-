<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Admin\ComputerController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/user',[HomeController::class,'page'])->middleware(['auth','admin']);

Route::middleware(['auth:sanctum', 'admin', 'verified'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('locale/{lang}',[LocaleController::class,'setLocale']);

Route::middleware(['auth:sanctum', 'admin', 'verified'])->group(function () {
    Route::get('/admin/computers/index', [ComputerController::class, 'index'])->name('admin.computers.index');
    Route::get('/admin/computers/create', [ComputerController::class, 'create'])->name('admin.computers.create');
    Route::post('/admin/computers', [ComputerController::class, 'store'])->name('admin.computers.store');
    Route::get('/admin/computers/{id}/edit', [ComputerController::class, 'edit'])->name('admin.computers.edit');
    Route::put('/admin/computers/{id}', [ComputerController::class, 'update'])->name('admin.computers.update');
    Route::delete('/admin/computers/{id}', [ComputerController::class, 'destroy'])->name('admin.computers.destroy');
});

Route::post('/bookings/check-availability', [BookingController::class, 'checkAvailability'])->name('bookings.checkAvailability');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/services', [BookingController::class, 'showServices'])->name('services');
Route::post('/bookings/pay', [BookingController::class, 'pay'])->name('bookings.pay');
Route::get('/bookings/confirm', [BookingController::class, 'confirmPayment'])->name('bookings.confirm');

Route::middleware(['auth:sanctum', 'manager', 'verified'])->group(function () {
    Route::get('/manager/bookings', [BookingController::class, 'index'])->name('manager.bookings');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('manager.bookings.edit');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('manager.bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('manager.bookings.destroy');
});