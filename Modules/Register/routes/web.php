<?php

use Illuminate\Support\Facades\Route;
use Modules\Register\Http\Controllers\RegisterController;

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


Route::prefix('register')->middleware('auth')->group(function () {

  // Route::get('/posisi', [PosisiController::class, 'index'])->name('posisi.index');
  // Route::get('/posisi/create', [PosisiController::class, 'create'])->name('posisi.create');
  // Route::get('/posisi/export', [PosisiController::class, 'export'])->name('posisi.export');
  // Route::get('/posisi/pdf', [PosisiController::class, 'pdf'])->name('posisi.pdf');
  // Route::get('/posisi/print', [PosisiController::class, 'print'])->name('posisi.print');
  // Route::post('/posisi/store', [PosisiController::class, 'store'])->name('posisi.store');
  // Route::get('/posisi/{id}', [PosisiController::class, 'edit'])->name('posisi.edit');
  // Route::get('/posisi/{id}/view', [PosisiController::class, 'view'])->name('posisi.view');
  // Route::put('/posisi/{id}', [PosisiController::class, 'update'])->name('posisi.update');
  // Route::delete('/posisi/{id}/del', [PosisiController::class, 'destroy'])->name('posisi.destroy');


  Route::get('/tamu', [RegisterController::class, 'tamu'])->name('register.tamu');
  Route::get('/tamu/store', [RegisterController::class, 'tamuStore'])->name('register.tamu.store');
  Route::get('/karyawan', [RegisterController::class, 'karyawan'])->name('register.karyawan');
  Route::get('/karyawan/store', [RegisterController::class, 'karyawanStore'])->name('register.karyawan.store');

});
