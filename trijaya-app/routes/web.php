<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AddonsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Models\Booking;
use App\Http\Controllers\CustomerController;

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
    return view('landing.home');
})-> name('landing');

Route::get('/form', function () {
    return view('landing.form');
})-> name('form');

Route::get('/welcome', function () {
    return view('welcome');
});

//dashboard
// Route::get('dashboard2', [DashboardController::class, 'index']);

//services
Route::get('/services', [ServicesController::class, 'index']);
Route::get('services/{id}', [ServicesController::class, 'detail']);
Route::post('/services', [ServicesController::class, 'store']);
Route::put('/services/{id}', [ServicesController::class, 'update']);
Route::delete('/services/{id}', [ServicesController::class, 'destroy']);

//status
Route::get('status', [StatusController::class, 'index']);
Route::get('status/{id}', [StatusController::class, 'detail']);
Route::post('status', [StatusController::class, 'store']);
Route::put('status/{id}', [StatusController::class, 'update']);
Route::delete('status/{id}', [StatusController::class, 'destroy']);

//add-ons
Route::get('addons', [AddonsController::class, 'index']);
Route::get('addons/{id}', [AddonsController::class, 'detail']);
Route::post('addons', [AddonsController::class, 'store']);
Route::put('addons/{id}', [AddonsController::class, 'update']);
Route::delete('addons/{id}', [AddonsController::class, 'destroy']);

//bookings

Route::get('bookings/{id}', [BookingController::class, 'detail']);
Route::post('bookings', [BookingController::class, 'store']);
Route::put('bookings/{id}', [BookingController::class, 'update']);
Route::delete('bookings/{id}', [BookingController::class, 'destroy']);

//feedback
Route::get('feedback', [FeedbackController::class, 'index']);
Route::post('feedback', [FeedbackController::class, 'store']);
Route::delete('feedback/{id}', [FeedbackController::class, 'destroy']);

Route::get('customers', [CustomerController::class, 'index']);

Route::get('token', function () {
    return csrf_token();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('bookings', [BookingController::class, 'index'])->name('admin.appointment.index');

    Route::get('addons', [AddonsController::class, 'index'])->name('admin.sparepart.index');

});
