<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\CheckUserIdle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'todo', 301);
Route::resource('todo', TodoController::class)->middleware(CheckUserIdle::class);
Route::get('health_check', HealthCheckController::class);
