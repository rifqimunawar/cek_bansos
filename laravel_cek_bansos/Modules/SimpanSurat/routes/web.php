<?php

use Illuminate\Support\Facades\Route;
use Modules\SimpanSurat\Http\Controllers\BerkasController;
use Modules\SimpanSurat\Http\Controllers\SimpanSuratController;
use Modules\SimpanSurat\Http\Controllers\SuratKeluarController;
use Modules\SimpanSurat\Http\Controllers\SuratMasukController;

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

Route::prefix('simpan')->middleware('auth')->group(function () {

  Route::get('/masuk', [SuratMasukController::class, 'index'])->name('s_masuk.index');
  Route::get('/masuk/create', [SuratMasukController::class, 'create'])->name('s_masuk.create');
  Route::get('/masuk/export', [SuratMasukController::class, 'export'])->name('s_masuk.export');
  Route::get('/masuk/pdf', [SuratMasukController::class, 'pdf'])->name('s_masuk.pdf');
  Route::get('/masuk/print', [SuratMasukController::class, 'print'])->name('s_masuk.print');
  Route::post('/masuk/store', [SuratMasukController::class, 'store'])->name('s_masuk.store');
  Route::get('/masuk/{id}', [SuratMasukController::class, 'edit'])->name('s_masuk.edit');
  Route::get('/masuk/{id}/view', [SuratMasukController::class, 'view'])->name('s_masuk.view');
  Route::delete('/masuk/{id}/del', [SuratMasukController::class, 'destroy'])->name('s_masuk.destroy');

  Route::get('/keluar', [SuratKeluarController::class, 'index'])->name('s_keluar.index');
  Route::get('/keluar/create', [SuratKeluarController::class, 'create'])->name('s_keluar.create');
  Route::get('/keluar/export', [SuratKeluarController::class, 'export'])->name('s_keluar.export');
  Route::get('/keluar/pdf', [SuratKeluarController::class, 'pdf'])->name('s_keluar.pdf');
  Route::get('/keluar/print', [SuratKeluarController::class, 'print'])->name('s_keluar.print');
  Route::post('/keluar/store', [SuratKeluarController::class, 'store'])->name('s_keluar.store');
  Route::get('/keluar/{id}', [SuratKeluarController::class, 'edit'])->name('s_keluar.edit');
  Route::get('/keluar/{id}/view', [SuratKeluarController::class, 'view'])->name('s_keluar.view');
  Route::delete('/keluar/{id}/del', [SuratKeluarController::class, 'destroy'])->name('s_keluar.destroy');

  Route::get('/berkas', [BerkasController::class, 'index'])->name('berkas.index');
  Route::get('/berkas/create', [BerkasController::class, 'create'])->name('berkas.create');
  Route::get('/berkas/export', [BerkasController::class, 'export'])->name('berkas.export');
  Route::get('/berkas/pdf', [BerkasController::class, 'pdf'])->name('berkas.pdf');
  Route::get('/berkas/print', [BerkasController::class, 'print'])->name('berkas.print');
  Route::post('/berkas/store', [BerkasController::class, 'store'])->name('berkas.store');
  Route::get('/berkas/{id}', [BerkasController::class, 'edit'])->name('berkas.edit');
  Route::get('/berkas/{id}/view', [BerkasController::class, 'view'])->name('berkas.view');
  Route::delete('/berkas/{id}/del', [BerkasController::class, 'destroy'])->name('berkas.destroy');
});

