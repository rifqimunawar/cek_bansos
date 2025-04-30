<?php

use Illuminate\Support\Facades\Route;
use Modules\Pembayaran\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('pembayaran')->middleware('auth')->group(function () {

  Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');

  // pembayran umum / rutin
  Route::post('/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
  Route::get('/{warga_id}/periode', [PembayaranController::class, 'periode_pembayaran'])->name('periode_pembayaran');
  Route::get('/{warga_id}/{periode_id}', [PembayaranController::class, 'indexByPeriode'])->name('indexByPeriode');

  // pembayran pam swadaya
  Route::get('/{warga_id}', [PembayaranController::class, 'pembayaran_pam'])->name('pembayaran_pam');
  Route::post('/storePam', [PembayaranController::class, 'storePam'])->name('pembayaran.storePam');
});

Route::prefix('pembayaran_denda')->middleware('auth')->group(function () {
  Route::get('/{warga_id}', [PembayaranController::class, 'pembayaran_denda'])->name('pembayaran_denda');
  Route::post('/storeDenda', [PembayaranController::class, 'storeDenda'])->name('pembayaran.storeDenda');
});

Route::get('/{id}/invoice', [PembayaranController::class, 'invoice'])->name('invoice');
Route::get('/invoice_verif/{id_qrcode}', [PembayaranController::class, 'invoiceVerifikasi'])->name('invoiceVerifikasi');
