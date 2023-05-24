<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('biens')->name('property.')->group(function () {
    Route::get('/', [ControllersPropertyController::class, 'index'])->name('index');
    Route::get('/{slug}/{property}', [ControllersPropertyController::class, 'show'])->name('show');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show', 'update']);
    Route::put('property/{property?}', [PropertyController::class, 'update'])->name('property.update');
    Route::resource('option', OptionController::class)->except(['show', 'update']);
    Route::put('option/{option?}', [OptionController::class, 'update'])->name('option.update');

});