<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tracks', [TrackController::class, 'index'])
    ->middleware(['auth'])
    ->name('tracks');


Route::middleware('can:admin')->group(function () {
    Route::get('/tracks/add', [TrackController::class, 'create'])
        ->middleware(['auth'])
        ->name('tracks.create');
    Route::post('/tracks/add', [TrackController::class, 'store'])
        ->middleware(['auth'])
        ->name('tracks.store');

    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->middleware(['auth'])
        ->name('admin.orders');
    Route::get('/admin/order/{order:id}', [AdminOrderController::class, 'show'])
        ->middleware(['auth'])
        ->name('admin.order.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
