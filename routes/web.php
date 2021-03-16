<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Masyarakat\laporanMasyarakat;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\DashboardController;


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
//     return view('index');
// });
Route::get('/', [LoginController::class, 'index'])->name('view.index');
Route::post('/register', [LoginController::class,'register'])->name('formRegister');

Route::post('/login', [LoginController::class,'login'])->name('login');

Route::post('/Pengaduan', [laporanMasyarakat::class,'storePengaduan'])->name('pengaduan');
Route::get('/laporan/{siapa?}', [laporanMasyarakat::class,'laporan'])->name('laporan');

Route::get('/logout', [loginController::class,'logout'])->name('logout');

Route::prefix('admin')->group(function(){
	Route::get('/dasboard', [DashboardController::class, 'index'])->name('dasboard.index');

	Route::resource('pengaduan', PengaduanController::class);
	Route::resource('petugas', PetugasController::class);
	Route::resource('masyarakat', MasyarakatController::class);
	Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');



// });
// Route::group(['middleware'=> ['auth','ceklevel:admin,petugas']],function()
// {
// 	Route::get('/', [DashboardController::class, 'index'])->name('dasboard.index');

});