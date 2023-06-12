<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidReportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AddHelpController;

Route::get('/report',[App\Http\Controllers\CovidReportController::class, 'index']);
Route::get('/refresh',[App\Http\Controllers\CovidReportController::class, 'store']);

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'check']);

Route::get('/user',[App\Http\Controllers\LoginController::class, 'user'])->middleware('auth:sanctum');

Route::post('/addhelp/{id}',[AddHelpController::class, 'addHelp']);//->middleware('auth:sanctum');
Route::get('/view/{id}',[AddHelpController::class, 'index']);
Route::get('/guids',[AddHelpController::class, 'viewAll']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
