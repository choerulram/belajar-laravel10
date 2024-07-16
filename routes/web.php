<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
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
    return view('dashboard');
});

// MAHASISWA
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa-add', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa-edit/{id}', [MahasiswaController::class, 'edit']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa-destroy/{id}', [MahasiswaController::class, 'destroy']);


// JURUSAN
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::get('/jurusan-add', [JurusanController::class, 'create']);
Route::post('/jurusan', [JurusanController::class, 'store']);
Route::get('/jurusan-edit/{id}', [JurusanController::class, 'edit']);
Route::put('/jurusan/{id}', [JurusanController::class, 'update']);
Route::delete('/jurusan-destroy/{id}', [JurusanController::class, 'destroy']);
