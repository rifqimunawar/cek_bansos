<?php

use Illuminate\Support\Facades\Route;
use Modules\Profile\Http\Controllers\ProfileController;

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


Route::prefix('profile')->middleware('auth')->group(function () {
  Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
  // Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
  // Route::get('/export', [ProfileController::class, 'export'])->name('profile.export');
  // Route::get('/pdf', [ProfileController::class, 'pdf'])->name('profile.pdf');
  // Route::get('/print', [ProfileController::class, 'print'])->name('profile.print');
  Route::post('/store', [ProfileController::class, 'store'])->name('profile.store');
  // Route::get('/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
  // Route::get('/{id}/view', [ProfileController::class, 'view'])->name('profile.view');
  // Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
  // Route::put('/{id}/pass', [ProfileController::class, 'resetPass'])->name('profile.resetPass');
  // Route::delete('/{id}/del', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
