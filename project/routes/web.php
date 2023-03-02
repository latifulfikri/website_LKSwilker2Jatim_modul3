<?php

use App\Http\Controllers\DashboardPagesController;
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
    // return view('contoh');
    return redirect('/dashboard/admin/');
});

Route::prefix('dashboard')->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [DashboardPagesController::class, 'index']);
        Route::get('/create', [DashboardPagesController::class, 'adminCreate']);
        Route::get('/ubah-password/{id}', [DashboardPagesController::class, 'changePassword']);
    });
    
    Route::prefix('peserta')->group(function() {
        Route::get('/', [DashboardPagesController::class, 'pesertaRead']);
        Route::get('/create', [DashboardPagesController::class, 'pesertaCreate']);
    });
    
    Route::prefix('vac-center')->group(function() {
        Route::get('/', [DashboardPagesController::class, 'vacCenter']);
        Route::get('/create', [DashboardPagesController::class, 'vacCenterCreate']);
        Route::get('/update/{id}', [DashboardPagesController::class, 'vacCenterUpdate']);
    });
});
