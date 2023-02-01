<?php

use App\Http\Controllers\API\peminjamanApiController;
use App\Http\Controllers\API\pesanApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->middleware(['auth','role:user'])->group(function () {
Route::get('/pesan' , [pesanApiController::class, 'index']);
Route::post('/pesan/store', [pesanApiController::class, 'store']);
Route::post('/pesan/update', [pesanApiController::class, 'update']);
Route::get('/peminjaman', [peminjamanApiController::class, 'index']);
Route::post('/peminjaman/store', [peminjamanApiController::class, 'store']);

});
