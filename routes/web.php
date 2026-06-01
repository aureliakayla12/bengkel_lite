<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\DetailServisController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

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

//Login
Route::get('/', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin'])->name('login.proseslogin');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Master Data

// Form Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// Form Motor
Route::get('/motor', [MotorController::class, 'index'])->name('motor.index');
Route::get('/motor/create', [MotorController::class, 'create'])->name('motor.create');
Route::post('/motor', [MotorController::class, 'store'])->name('motor.store');
Route::get('/motor/{id}/edit', [MotorController::class, 'edit'])->name('motor.edit');
Route::put('/motor/{id}', [MotorController::class, 'update'])->name('motor.update');
Route::delete('/motor/{id}', [MotorController::class, 'destroy'])->name('motor.destroy');

// Form Mekanik
Route::get('/mekanik', [MekanikController::class, 'index'])->name('mekanik.index');
Route::get('/mekanik/create', [MekanikController::class, 'create'])->name('mekanik.create');
Route::post('/mekanik', [MekanikController::class, 'store'])->name('mekanik.store');
Route::get('/mekanik/{id}/edit', [MekanikController::class, 'edit'])->name('mekanik.edit');
Route::put('/mekanik/{id}', [MekanikController::class, 'update'])->name('mekanik.update');
Route::delete('/mekanik/{id}', [MekanikController::class, 'destroy'])->name('mekanik.destroy');

// Form Sparepart
Route::get('/sparepart', [SparepartController::class, 'index'])->name('sparepart.index');
Route::get('/sparepart/create', [SparepartController::class, 'create'])->name('sparepart.create');
Route::post('/sparepart', [SparepartController::class, 'store'])->name('sparepart.store');
Route::get('/sparepart/{id}/edit', [SparepartController::class, 'edit'])->name('sparepart.edit');
Route::put('/sparepart/{id}', [SparepartController::class, 'update'])->name('sparepart.update');
Route::delete('/sparepart/{id}', [SparepartController::class, 'destroy'])->name('sparepart.destroy');

// Form Servis
Route::get('/servis', [ServisController::class, 'index'])->name('servis.index');
Route::get('/servis/create', [ServisController::class, 'create'])->name('servis.create');
Route::post('/servis', [ServisController::class, 'store'])->name('servis.store');
Route::get('/servis/{id}/edit', [ServisController::class, 'edit'])->name('servis.edit');
Route::put('/servis/{id}', [ServisController::class, 'update'])->name('servis.update');
Route::delete('/servis/{id}', [ServisController::class, 'destroy'])->name('servis.destroy');
Route::get('/servis/{id}/show', [ServisController::class, 'show'])->name('servis.show');

// Form Detail Servis
Route::post('/detail-servis/store', [DetailServisController::class, 'store'])->name('detail-servis.store');
Route::delete('/detail-servis/{id}', [DetailServisController::class, 'destroy'])->name('detail-servis.destroy');

// Form Users
Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

