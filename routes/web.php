<?php

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SessionsController::class, 'viewLogin'])->name('/');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [SessionsController::class, 'destroy'])->name('login.destroy');
    Route::get('/setting', [SettingsController::class, 'viewSetting'])->name('setting.index');
});
