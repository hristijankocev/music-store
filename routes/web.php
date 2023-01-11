<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
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


Route::middleware('can:admin')->group(function () {
    Route::get('/tracks', [TrackController::class, 'index'])
        ->middleware(['auth'])
        ->name('tracks');
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

    Route::get('/stats', function () {
        return view('admin.stats.index')->with([
            'tracks_sold' => DB::table('vw_stats_tracks_sold')->get(),
            'monthly_revenue' => DB::table('vw_stats_monthly_revenue')->get(),
            'tracks_per_genre' => DB::table('vw_stats_tracks_per_genre')->get(),
            'tracks_per_year' => DB::table('vw_stats_tracks_per_year')->get()
        ]);
    })->name('admin.statistics');
});

Route::middleware('can:customer')->group(function () {
    Route::get('/shop', function () {
        return view('customer.shop.index')->with([
            'items' => Item::paginate(5),
        ]);
    })->name('shop');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
