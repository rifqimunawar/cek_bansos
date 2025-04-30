<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\MenuController;
use Modules\Settings\Http\Controllers\RolesController;
use Modules\Settings\Http\Controllers\SettingsController;

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
Route::prefix('settings')->middleware('auth')->group(function () {
  Route::get('/general', [SettingsController::class, 'index'])->name('settings.index');
  Route::get('/general/create', [SettingsController::class, 'create'])->name('settings.create');
  Route::post('/general/store', [SettingsController::class, 'store'])->name('settings.store');
  Route::get('/general/{id}', [SettingsController::class, 'edit'])->name('settings.edit');
  Route::put('/general/{id}', [SettingsController::class, 'update'])->name('settings.update');
  Route::delete('/general/{id}', [SettingsController::class, 'destroy'])->name('settings.destroy');

  Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
  Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
  Route::post('menu/store', [MenuController::class, 'store'])->name('menu.store');
  Route::get('menu/{id}', [MenuController::class, 'edit'])->name('menu.edit');
  Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
  Route::delete('menu/{id}/del', [MenuController::class, 'destroy'])->name('menu.destroy');

  Route::get('role', [RolesController::class, 'index'])->name('role.index');
  Route::get('role/create', [RolesController::class, 'create'])->name('role.create');
  Route::get('role/export', [RolesController::class, 'export'])->name('role.export');
  Route::get('role/pdf', [RolesController::class, 'pdf'])->name('role.pdf');
  Route::get('role/print', [RolesController::class, 'print'])->name('role.print');
  Route::post('role/store', [RolesController::class, 'store'])->name('role.store');
  Route::get('role/{id}', [RolesController::class, 'edit'])->name('role.edit');
  Route::put('role/{id}', [RolesController::class, 'update'])->name('role.update');
  Route::delete('role/{id}/del', [RolesController::class, 'destroy'])->name('role.destroy');
  Route::get('role/giveAkses/{id}', [RolesController::class, 'giveAkses'])->name('role.giveAkses');
  Route::post('role/giveAkses/store', [RolesController::class, 'giveAksesStore'])->name('role.giveAkses.store');
});

