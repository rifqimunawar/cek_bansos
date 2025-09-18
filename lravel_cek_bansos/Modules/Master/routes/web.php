<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\JenisKendaraanController;
use Modules\Master\Http\Controllers\KaryawanController;
use Modules\Master\Http\Controllers\KlasifikasiSuratController;
use Modules\Master\Http\Controllers\ParameterController;
use Modules\Master\Http\Controllers\PenandatanganController;
use Modules\Master\Http\Controllers\PeriodeController;
use Modules\Master\Http\Controllers\PosisiController;
use Modules\Master\Http\Controllers\WargaController;

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

Route::prefix('master')->middleware('auth')->group(function () {
  Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
  Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
  Route::get('/warga/export', [WargaController::class, 'export'])->name('warga.export');
  Route::get('/warga/pdf', [WargaController::class, 'pdf'])->name('warga.pdf');
  Route::get('/warga/print', [WargaController::class, 'print'])->name('warga.print');
  Route::post('/warga/store', [WargaController::class, 'store'])->name('warga.store');
  Route::get('/warga/{id}', [WargaController::class, 'edit'])->name('warga.edit');
  Route::get('/warga/{id}/view', [WargaController::class, 'view'])->name('warga.view');
  Route::delete('/warga/{id}/del', [WargaController::class, 'destroy'])->name('warga.destroy');

  Route::get('/parameter', [ParameterController::class, 'create'])->name('parameter.create');
  Route::post('/parameter/store', [ParameterController::class, 'store'])->name('parameter.store');



  Route::get('/klasifikasi', [KlasifikasiSuratController::class, 'index'])->name('klasifikasi.index');
  Route::get('/klasifikasi/create', [KlasifikasiSuratController::class, 'create'])->name('klasifikasi.create');
  Route::get('/klasifikasi/export', [KlasifikasiSuratController::class, 'export'])->name('klasifikasi.export');
  Route::get('/klasifikasi/pdf', [KlasifikasiSuratController::class, 'pdf'])->name('klasifikasi.pdf');
  Route::get('/klasifikasi/print', [KlasifikasiSuratController::class, 'print'])->name('klasifikasi.print');
  Route::post('/klasifikasi/store', [KlasifikasiSuratController::class, 'store'])->name('klasifikasi.store');
  Route::get('/klasifikasi/{id}', [KlasifikasiSuratController::class, 'edit'])->name('klasifikasi.edit');
  Route::get('/klasifikasi/{id}/view', [KlasifikasiSuratController::class, 'view'])->name('klasifikasi.view');
  Route::delete('/klasifikasi/{id}/del', [KlasifikasiSuratController::class, 'destroy'])->name('klasifikasi.destroy');

  Route::get('/penandatangan', [PenandatanganController::class, 'index'])->name('penandatangan.index');
  Route::get('/penandatangan/create', [PenandatanganController::class, 'create'])->name('penandatangan.create');
  Route::get('/penandatangan/export', [PenandatanganController::class, 'export'])->name('penandatangan.export');
  Route::get('/penandatangan/pdf', [PenandatanganController::class, 'pdf'])->name('penandatangan.pdf');
  Route::get('/penandatangan/print', [PenandatanganController::class, 'print'])->name('penandatangan.print');
  Route::post('/penandatangan/store', [PenandatanganController::class, 'store'])->name('penandatangan.store');
  Route::get('/penandatangan/{id}', [PenandatanganController::class, 'edit'])->name('penandatangan.edit');
  Route::get('/penandatangan/{id}/view', [PenandatanganController::class, 'view'])->name('penandatangan.view');
  Route::delete('/penandatangan/{id}/del', [PenandatanganController::class, 'destroy'])->name('penandatangan.destroy');
});
