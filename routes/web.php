<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SettingsController;

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

Route::get('/', [LoginController::class, 'index']);
Route::get('/auth', [LoginController::class, 'index']);
Route::post('/auth/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['web']], function () {
    Route::get('/home', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/dashboard/', [AccountController::class, 'dashboard'])->middleware('authority')->name('account.dashboard');
    Route::get('/account/profile/', [AccountController::class, 'profile'])->middleware('authority');
    Route::get('/account/transfer/', [AccountController::class, 'transfer'])->middleware('authority');
    Route::post('/transfer/process', [AccountController::class, 'confirmTransfer'])->name('transfer.process');
    Route::get('/loans', [AccountController::class, 'loan'])->middleware('authority');
    Route::get('/investment', [AccountController::class, 'investment'])->middleware('authority');


    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/settings/notifications', [SettingsController::class, 'notifications'])->name('settings.notifications');
    Route::post('/settings/notifications/update', [SettingsController::class, 'updateNotifications'])->name('settings.notification.update');
});
