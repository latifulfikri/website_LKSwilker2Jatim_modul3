<?php

use App\Http\Controllers\ApiAdmins;
use App\Http\Controllers\ApiPeserta;
use App\Http\Controllers\ApiVacCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::prefix('admins')->group(function() {
        Route::get('/', [ApiAdmins::class, 'index']);
        Route::post('/tambah', [ApiAdmins::class, 'store']);
        Route::put('/edit/{id}', [ApiAdmins::class, 'update']);
        Route::put('/ubah-password/{id}', [ApiAdmins::class, 'changePassword']);
        Route::delete('/hapus/{id}', [ApiAdmins::class, 'destroy']);
        Route::get('/{id}', [ApiAdmins::class, 'show']);
    });
    Route::prefix('peserta')->group(function() {
        Route::get('/', [ApiPeserta::class, 'index']);
        Route::post('/tambah', [ApiPeserta::class, 'store']);
        Route::put('/edit/{id}', [ApiPeserta::class, 'update']);
        Route::delete('/hapus/{id}', [ApiPeserta::class, 'destroy']);
        Route::get('/{id}', [ApiPeserta::class, 'show']);
    });
    Route::prefix('vac-center')->group(function() {
        Route::get('/', [ApiVacCenter::class, 'index']);
        Route::post('/tambah', [ApiVacCenter::class, 'store']);
        Route::put('/edit/{id}', [ApiVacCenter::class, 'update']);
        Route::delete('/hapus/{id}', [ApiVacCenter::class, 'destroy']);
        Route::get('/{id}', [ApiVacCenter::class, 'show']);
    });
});
