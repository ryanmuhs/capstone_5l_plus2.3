<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\GeoLocationController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
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
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/pasien/registrasi', function () {
//     return view('pasien.registrasi');
// })->name('pasien.registrasi');
Route::middleware(['auth', 'role:admin,staf'])->group(function(){
    Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
    Route::patch('/antrian/update', [AntrianController::class, 'update'])->name('antrian.update');

    Route::get('/pasien/data', [PasienController::class, 'index'])->name('pasien.data');
});

Route::get('/pasien/registrasi',[PasienController::class, 'create'])->name('pasien.registrasi');
Route::post('/pasien/registrasi',[PasienController::class, 'store'])->name('pasien.registrasi.store');
Route::get('/pasien/{id}', [PasienController::class, 'show'])->name('pasien.detail');

Route::post('/pasien/validate-nik', [PasienController::class, 'validateNik'])->name('pasien.validate.nik');

Route::post('/pasien/login', [PasienController::class, 'login'])->name('pasien.login');
Route::get('/home', [PasienController::class, 'home'])->name('pasien.home');


Route::get('/prov', [IndoRegionController::class, 'form'])->name('prov');

require __DIR__.'/auth.php';
