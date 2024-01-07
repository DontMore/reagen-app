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
Route::get('/management-stock', [ManagementStockController::class, 'index'])->name('management-stock')->middleware('auth');
Route::get('/add-reagen', [ManagementStockController::class, 'addReagen'])->middleware('auth');
Route::post('/add-reagen', [ManagementStockController::class, 'addReagenStore'])->middleware('auth');
Route::get('/add-stock-reagen', [ManagementStockController::class, 'addStockReagen'])->middleware('auth');
Route::get('/view/{noCatalog}', [ManagementStockController::class, 'viewReagen'])->name('data.view')->middleware('auth');
Route::get('/edit/{noCatalog}', [ManagementStockController::class, 'editReagen'])->name('data.edit')->middleware('auth');
Route::post('/delete/{noCatalog}', [ManagementStockController::class, 'deleteReagen'])->name('data.delete')->middleware('auth');
Route::post('/update/{noCatalog}', [ManagementStockController::class, 'updateReagen'])->name('data.update')->middleware('auth');
Route::get('/reagen/{noCatalog}', [ManagementStockController::class, 'getReagenData'])->middleware('auth');
Route::post('/add-stock-reagen', [ManagementStockController::class, 'addStock'])->middleware('auth');

// route logbook
Route::get('/logbook', [LogbookController::class, 'index'])->name('logbook.index')->middleware('auth'); // Route untuk menampilkan data logbook

// route order
Route::get('/order', [OrderController::class, 'index'])->middleware('auth');

// route report
Route::get('/report', [ReportController::class, 'index'])->middleware('auth');

// route stock opname
Route::get('/stock-opname', [StockOpnameController::class, 'index'])->middleware('auth');
