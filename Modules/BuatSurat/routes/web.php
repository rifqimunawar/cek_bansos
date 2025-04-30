<?php

use Illuminate\Support\Facades\Route;
use Modules\BuatSurat\Http\Controllers\BuatSuratController;
use Modules\BuatSurat\Http\Controllers\SuratDinasController;

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


Route::prefix('buat')->middleware('auth')->group(function () {

  Route::get('/surat_dinas', [SuratDinasController::class, 'index'])->name('surat_dinas.index');
  Route::get('/surat_dinas/create', [SuratDinasController::class, 'create'])->name('surat_dinas.create');
  Route::get('/surat_dinas/export', [SuratDinasController::class, 'export'])->name('surat_dinas.export');
  Route::get('/surat_dinas/pdf', [SuratDinasController::class, 'pdf'])->name('surat_dinas.pdf');
  Route::get('/surat_dinas/print', [SuratDinasController::class, 'print'])->name('surat_dinas.print');
  Route::get('/surat-dinas/preview/{id}', [SuratDinasController::class, 'preview'])->name('surat_dinas.preview');
  Route::post('/surat_dinas/store', [SuratDinasController::class, 'store'])->name('surat_dinas.store');
  Route::get('/surat_dinas/{id}', [SuratDinasController::class, 'edit'])->name('surat_dinas.edit');
  Route::get('/surat_dinas/{id}/view', [SuratDinasController::class, 'view'])->name('surat_dinas.view');
  Route::delete('/surat_dinas/{id}/del', [SuratDinasController::class, 'destroy'])->name('surat_dinas.destroy');

});


