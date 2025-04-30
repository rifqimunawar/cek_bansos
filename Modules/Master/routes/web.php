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
  Route::get('/jenis_kendaraan', [JenisKendaraanController::class, 'index'])->name('jenis_kendaraan.index');
  Route::get('/jenis_kendaraan/create', [JenisKendaraanController::class, 'create'])->name('jenis_kendaraan.create');
  Route::get('/jenis_kendaraan/export', [JenisKendaraanController::class, 'export'])->name('jenis_kendaraan.export');
  Route::get('/jenis_kendaraan/pdf', [JenisKendaraanController::class, 'pdf'])->name('jenis_kendaraan.pdf');
  Route::get('/jenis_kendaraan/print', [JenisKendaraanController::class, 'print'])->name('jenis_kendaraan.print');
  Route::post('/jenis_kendaraan/store', [JenisKendaraanController::class, 'store'])->name('jenis_kendaraan.store');
  Route::get('/jenis_kendaraan/{id}', [JenisKendaraanController::class, 'edit'])->name('jenis_kendaraan.edit');
  Route::get('/jenis_kendaraan/{id}/view', [JenisKendaraanController::class, 'view'])->name('jenis_kendaraan.view');
  Route::put('/jenis_kendaraan/{id}', [JenisKendaraanController::class, 'update'])->name('jenis_kendaraan.update');
  Route::delete('/jenis_kendaraan/{id}/del', [JenisKendaraanController::class, 'destroy'])->name('jenis_kendaraan.destroy');

  Route::get('/posisi', [PosisiController::class, 'index'])->name('posisi.index');
  Route::get('/posisi/create', [PosisiController::class, 'create'])->name('posisi.create');
  Route::get('/posisi/export', [PosisiController::class, 'export'])->name('posisi.export');
  Route::get('/posisi/pdf', [PosisiController::class, 'pdf'])->name('posisi.pdf');
  Route::get('/posisi/print', [PosisiController::class, 'print'])->name('posisi.print');
  Route::post('/posisi/store', [PosisiController::class, 'store'])->name('posisi.store');
  Route::get('/posisi/{id}', [PosisiController::class, 'edit'])->name('posisi.edit');
  Route::get('/posisi/{id}/view', [PosisiController::class, 'view'])->name('posisi.view');
  Route::put('/posisi/{id}', [PosisiController::class, 'update'])->name('posisi.update');
  Route::delete('/posisi/{id}/del', [PosisiController::class, 'destroy'])->name('posisi.destroy');

  Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
  Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
  Route::get('/karyawan/export', [KaryawanController::class, 'export'])->name('karyawan.export');
  Route::get('/karyawan/pdf', [KaryawanController::class, 'pdf'])->name('karyawan.pdf');
  Route::get('/karyawan/print', [KaryawanController::class, 'print'])->name('karyawan.print');
  Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
  Route::get('/karyawan/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
  Route::get('/karyawan/{id}/view', [KaryawanController::class, 'view'])->name('karyawan.view');
  Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
  Route::delete('/karyawan/{id}/del', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

  Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
  Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
  Route::get('/warga/export', [WargaController::class, 'export'])->name('warga.export');
  Route::get('/warga/pdf', [WargaController::class, 'pdf'])->name('warga.pdf');
  Route::get('/warga/print', [WargaController::class, 'print'])->name('warga.print');
  Route::post('/warga/store', [WargaController::class, 'store'])->name('warga.store');
  Route::get('/warga/{id}', [WargaController::class, 'edit'])->name('warga.edit');
  Route::get('/warga/{id}/view', [WargaController::class, 'view'])->name('warga.view');
  Route::delete('/warga/{id}/del', [WargaController::class, 'destroy'])->name('warga.destroy');

  Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
  Route::get('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
  Route::get('/periode/export', [PeriodeController::class, 'export'])->name('periode.export');
  Route::get('/periode/pdf', [PeriodeController::class, 'pdf'])->name('periode.pdf');
  Route::get('/periode/print', [PeriodeController::class, 'print'])->name('periode.print');
  Route::post('/periode/store', [PeriodeController::class, 'store'])->name('periode.store');
  Route::get('/periode/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
  Route::get('/periode/{id}/view', [PeriodeController::class, 'view'])->name('periode.view');
  Route::delete('/periode/{id}/del', [PeriodeController::class, 'destroy'])->name('periode.destroy');

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
