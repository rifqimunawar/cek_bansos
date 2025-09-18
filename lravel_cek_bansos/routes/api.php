<?php

use App\Http\Controllers\ApiMobileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {


  Route::post('/login', [ApiMobileController::class, 'login']);
  Route::get('/index', [ApiMobileController::class, 'index'])->middleware('auth:sanctum');
  Route::get('/history', [ApiMobileController::class, 'history'])->middleware('auth:sanctum');


});
