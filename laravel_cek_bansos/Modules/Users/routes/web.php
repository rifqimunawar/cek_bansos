<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;

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

// Route::prefix('users')->middleware(['auth', 'check.permission:users'])->group(function () {

Route::prefix('users')->middleware('auth')->group(function () {

  // Route untuk Users
  Route::get('/', [UsersController::class, 'index'])->name('users.index');
  Route::get('/create', [UsersController::class, 'create'])->name('users.create');
  Route::get('/export', [UsersController::class, 'export'])->name('users.export');
  Route::get('/pdf', [UsersController::class, 'pdf'])->name('users.pdf');
  // Route::get('/print', [UsersController::class, 'print'])->name('users.print');
  Route::post('/store', [UsersController::class, 'store'])->name('users.store');
  Route::get('/{id}', [UsersController::class, 'edit'])->name('users.edit');
  // Route::get('/{id}/view', [UsersController::class, 'view'])->name('users.view');
  Route::put('/{id}', [UsersController::class, 'update'])->name('users.update');
  Route::put('/{id}/pass', [UsersController::class, 'resetPass'])->name('users.resetPass');
  Route::delete('/{id}/del', [UsersController::class, 'destroy'])->name('users.destroy');

});
