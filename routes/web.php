<?php

use App\Http\Controllers\AdminFasilitasController;
use App\Http\Controllers\AdminPenginapanController;
use App\Http\Controllers\AdminReservasiController;
use App\Http\Controllers\AdminWisataController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FasilitasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\RiwayatBookingController;
use App\Http\Controllers\WisataController;
use App\Models\Booking;

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

Route::get('/', [BerandaController::class, 'index']);

Route::get('/fasilitas', [FasilitasController::class, 'fasilitas']);

Route::get('/wisata', [WisataController::class, 'wisata']);

Route::get('/penginapan', [PenginapanController::class, 'penginapan']);
Route::get('/detail-penginapan/{id}', [PenginapanController::class, 'detail']);
Route::get('/booking/{id}', [PenginapanController::class, 'booking']);
Route::post('/booking/{id}', [PenginapanController::class, 'bookingNow']);

Route::get('/riwayat-booking', [RiwayatBookingController::class, 'riwayat']);
Route::delete('/riwayat-booking/{id}', [RiwayatBookingController::class, 'delete']);

Route::get('/kontak', function () {
    return view('kontak');
});

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::resource('/admin/fasilitas', AdminFasilitasController::class);
Route::resource('/admin/wisata', AdminWisataController::class);
Route::resource('/admin/penginapan', AdminPenginapanController::class);
Route::get('/admin/reservasi', [AdminReservasiController::class, 'index']);
Route::get('/admin/reservasi/{id}/konfirmasi', [AdminReservasiController::class, 'konfirmasi']);
