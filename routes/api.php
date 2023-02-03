<?php

use App\Http\Controllers\API\peminjamanApiController;
use App\Http\Controllers\API\pengembalianApiController;
use App\Http\Controllers\API\pesanApiController;
use App\Http\Controllers\API\userApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [userApiController::class, 'login']);

Route::middleware(['auth:sanctum' , 'role:user'])->prefix('user')->group(function() {
    Route::post('/logout', [userApiController::class, 'logout']);
    Route::prefix('peminjaman')->controller(peminjamanApiController::class)->group(function() {
        Route::get('/', 'index');
        Route::post('/store','store');
    });
    Route::prefix('pengembalian')->controller(pengembalianApiController::class)->group(function() {
        Route::get('/','index');
        Route::post('/store','store');
    });
    Route::prefix('pesan')->controller(pesanApiController::class)->group(function(){
        Route::get('/','index');
    });
});

Route::middleware(['auth:sanctum','role:admin'])->prefix('admin')->group(function() {
    Route::post('/logout', [userApiController::class, 'logout']);
    Route::get('/', [userApiController::class, 'allAdmin']);
    Route::post('/tambah_admin', [userApiController::class, 'tambahAdmin']);
    Route::post('/edit_admin/{id}', [userApiController::class, 'destroyAdmin']);
});