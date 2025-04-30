<?php

use App\Helpers\GetSettings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GlobalController;

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

// Route::get('/', function () {
//   return redirect('dashboard');
// });
Route::get('/api/ronda-jadwal', function () {
  return response()->json(json_decode(GetSettings::getRondaJadwal()), 200);
});
Route::get('/getKab/{prov_id}', [GlobalController::class, 'getKab'])->name('getKab');
Route::get('/getKec/{kab_id}', [GlobalController::class, 'getKec'])->name('getKec');
Route::get('/getKel/{kec_id}', [GlobalController::class, 'getKel'])->name('getKel');
