<?php

use Illuminate\Support\Facades\Route;
use Modules\Laporan\Http\Controllers\LaporanController;

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

// Route::group([], function () {
//     Route::resource('laporan', LaporanController::class)->names('laporan');
// });
Route::prefix('lap')->middleware('auth')->group(function () {

  Route::get('/keuangan', [LaporanController::class, 'keuangan'])->name('laporan.keuangan');
  Route::get('/pembayaran', [LaporanController::class, 'pembayaran'])->name('laporan.pembayaran');
  Route::get('/get_data_pembayaran', [LaporanController::class, 'get_ajx_pembayaran']);
  Route::get('/pembayaran/export', [LaporanController::class, 'export'])->name('lap_pembayaran.export');
  Route::get('/pembayaran/pdf', [LaporanController::class, 'pdf'])->name('lap_pembayaran.pdf');

  Route::get('/absen', [LaporanController::class, 'absen'])->name('laporan.absen');
  Route::get('/view/{id}', [LaporanController::class, 'view'])->name('laporan.view');
});
