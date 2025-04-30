<?php

use Illuminate\Support\Facades\Route;
use Modules\Ronda\Http\Controllers\RondaController;

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

Route::prefix('ronda')->middleware('auth')->group(function () {

  Route::get('/jadwal', [RondaController::class, 'jadwal'])->name('jadwal.index');

  Route::get('/jadwalkan', [RondaController::class, 'index'])->name('jadwalkan.index');
  Route::get('/jadwalkan/create', [RondaController::class, 'create'])->name('jadwalkan.create');
  Route::get('/jadwalkan/export', [RondaController::class, 'export'])->name('jadwalkan.export');
  Route::get('/jadwalkan/pdf', [RondaController::class, 'pdf'])->name('jadwalkan.pdf');
  Route::get('/jadwalkan/print', [RondaController::class, 'print'])->name('jadwalkan.print');
  Route::get('/jadwalkan/{id}', [RondaController::class, 'edit'])->name('jadwalkan.edit');
  Route::get('/jadwalkan/{id}/view', [RondaController::class, 'view'])->name('jadwalkan.view');
  Route::post('/jadwalkan/store', [RondaController::class, 'store'])->name('jadwalkan.store');
  Route::post('/jadwalkan/generate', [RondaController::class, 'generate'])->name('jadwalkan.generate');
  Route::post('/jadwalkan/preview', [RondaController::class, 'preview'])->name('jadwalkan.preview');
  Route::post('/jadwalkan/generate/final', [RondaController::class, 'storeAfterPreview'])->name('jadwalkan.generate.final');
  Route::post('/jadwalkan/absen', [RondaController::class, 'absen'])->name('absen.ronda');
  Route::delete('/jadwalkan/{id}/del', [RondaController::class, 'destroy'])->name('jadwalkan.destroy');

});
