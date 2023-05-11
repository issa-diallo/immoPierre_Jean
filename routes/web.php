<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show', 'update']);
    Route::put('property/{property?}', [PropertyController::class, 'update'])->name('property.update');
    Route::resource('option', OptionController::class)->except(['show', 'update']);
    Route::put('option/{option?}', [OptionController::class, 'update'])->name('option.update');

});