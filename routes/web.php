<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\PeminjamanController;
use App\Http\Controllers\user\PengembalianController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\UserController;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->middleware('auth' == 'role:user')->group(function() {
    Route::get('/dashboard' , [DashboardController::class , 'index'])->name('user.dashboard');
    // peminjaman
    Route::get('peminjaman/form' , [PeminjamanController::class, 'indexForm'])->name('user.peminjaman.form');
    Route::get('/peminjaman/riwayat' , [PeminjamanController::class, 'indexRiwayat'])->name('user.peminjaman.riwayat');
    Route::post('/peminjaman/form/submit' , [PeminjamanController::class , 'storeForm'])->name('user.peminjaman.form.submit');
    //pengembalian
    Route::get('/pengembalian/form' , [PengembalianController::class , 'indexForm'])->name('user.pengembalian,form');
    Route::get('/pengembalian/riwayat' , [PengembalianController::class , 'indexRiwayat'])->name('user.pengembalian.riwayat');
    Route::post('/pengembalian/form/submit' , [PengembalianController::class , 'storeForm'])->name('user.pengembalian.form.submit');
    //profile
    Route::get('/profile' , [ProfileController::class, 'index'])->name('user.profile');
    Route::put('/profile/update/', [ProfileController::class , 'update'])->name('user.profile.update');
}); 

Route::prefix('admin')->middleware('auth' == 'role:admin')->group(function() {
    Route::get('/dashboard' , [AdminDashboardController::class, 'index'])->name('admin.dashboard');

}) ;