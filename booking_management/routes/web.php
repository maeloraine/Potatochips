<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerRoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Pokemon.Customer.Authentication.landing-page'); //replace to landing page
})->name('/');

Route::get('/customer-login', function () {
    return view('Pokemon.Customer.Authentication.customer-login');
})->name('customer-login');

// Route::middleware(['auth', 'verified'])->get('/customer/home/customer-booking', [CustomerRoomController::class, 'index'])->name('customer.index');

Route::get('/customer/home/customer-booking', [CustomerRoomController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('customer.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
