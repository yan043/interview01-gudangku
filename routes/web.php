<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;

Route::get('/login', [AuthController::class, 'auth_login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'role:administrator,manager'])->group(function () {

    Route::prefix('master')->group(function () {
        Route::get('/category', [MasterController::class, 'category']);
        Route::get('/item', [MasterController::class, 'item']);
        Route::get('/supplier', [MasterController::class, 'supplier']);
    });

    Route::prefix('transaction')->group(function () {
        Route::get('/goods-receipt', [TransactionController::class, 'goods_receipt']);
        Route::get('/purchase-goods', [TransactionController::class, 'purchase_goods']);
        Route::get('/stock-transactions', [TransactionController::class, 'stock_transactions']);
    });

    Route::prefix('report')->group(function () {
        Route::get('/stock-report', [ReportController::class, 'stock_report']);
        Route::get('/purchase-report', [ReportController::class, 'purchase_report']);
        Route::get('/acceptance-report', [ReportController::class, 'acceptance_report']);
    });

    Route::prefix('settings')->group(function () {
        Route::get('/user', [SettingsController::class, 'user']);
        Route::get('/level', [SettingsController::class, 'level']);
    });

});
