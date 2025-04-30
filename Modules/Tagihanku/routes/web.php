<?php

use Illuminate\Support\Facades\Route;
use Modules\Tagihanku\Http\Controllers\TagihankuController;

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
//     Route::resource('tagihanku', TagihankuController::class)->names('tagihanku');
// });


Route::prefix('tagihanku')->middleware('auth')->group(function () {
  Route::get('/semua', [TagihankuController::class, 'semua'])->name('tagihaku.semua');
  Route::get('/rutin', [TagihankuController::class, 'rutin'])->name('tagihaku.rutin');
  Route::get('/pam', [TagihankuController::class, 'pam'])->name('tagihaku.pam');
  Route::get('/ronda', [TagihankuController::class, 'ronda'])->name('tagihaku.ronda');
});
