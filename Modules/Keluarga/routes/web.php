<?php

use Illuminate\Support\Facades\Route;
use Modules\Keluarga\Http\Controllers\KeluargaController;
use Modules\Dashboard\Http\Controllers\DashboardController;

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


Route::prefix('keluarga')->middleware('auth')->group(function () {

  Route::get('/', [KeluargaController::class, 'index'])->name('keluarga.index');
  Route::get('/create', [KeluargaController::class, 'create'])->name('keluarga.create');
  Route::get('/export', [KeluargaController::class, 'export'])->name('keluarga.export');
  Route::get('/pdf', [KeluargaController::class, 'pdf'])->name('keluarga.pdf');
  Route::get('/print', [KeluargaController::class, 'print'])->name('keluarga.print');
  Route::post('/store', [KeluargaController::class, 'store'])->name('keluarga.store');
  Route::get('/{id}', [KeluargaController::class, 'edit'])->name('keluarga.edit');
  Route::get('/{id}/view', [KeluargaController::class, 'view'])->name('keluarga.view');
  Route::delete('/{id}/del', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');

});
