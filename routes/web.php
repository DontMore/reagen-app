<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementStockController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockOpnameController;
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
Route::get('/', [AuthenticationController::class, 'login'])->middleware('guest');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'authenticate']);
Route::get('/register', [AuthenticationController::class, 'register']);
Route::post('/register', [AuthenticationController::class, 'store']);
Route::post('/logout', [AuthenticationController::class, 'logout']);

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// route management stock
Route::get('/management-stock', [ManagementStockController::class, 'index'])->middleware('auth');
Route::get('/add-reagen', [ManagementStockController::class, 'addReagen'])->middleware('auth');

// route logbook
Route::get('/logbook', [LogbookController::class, 'index'])->middleware('auth');

// route order
Route::get('/order', [OrderController::class, 'index'])->middleware('auth');

// route report
Route::get('/report', [ReportController::class, 'index'])->middleware('auth');

// route stock opname
Route::get('/stock-opname', [StockOpnameController::class, 'index'])->middleware('auth');
