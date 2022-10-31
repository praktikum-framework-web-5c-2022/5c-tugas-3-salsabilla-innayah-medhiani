<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dosen', function () {
//     return view('dosen/index');
// });

Route::get('/', [DashboardController::class, 'index']);

Route::get('/mahasiswa', function () {
    return view('mahasiswa/index');
});
Route::get('/matkul', function () {
    return view('matkul/index');
});

// resource
Route::resources([
    'dosen' => DosenController::class,
    'mahasiswa' => MahasiswaController::class,
    'matkul' => MatkulController::class
]);
