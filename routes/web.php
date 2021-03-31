<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Masyarakat\laporanMasyarakat;
use App\Http\Controllers\Masyarakat\EmailController;
use App\Http\Controllers\Masyarakat\SocialController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TanggapanController;



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

Route::get('/', [LoginController::class, 'index'])->name('view.index');
Route::post('/register', [LoginController::class,'register'])->name('formRegister');

// email verify
Route::post('/masyarakat/sendverification', [EmailController::class, 'sendVerification'])->name('pekat.sendVerification');
Route::get('/masyarakat/verify/{nik}', [EmailController::class, 'verify'])->name('pekat.verify');

Route::post('/login', [LoginController::class,'login'])->name('login');
// sosial
Route::get('login/{provider}', [SocialController::class,'redirectToProvider'])->name('social.login');
Route::get('login/{provider}/callback', [SocialController::class,'handleProviderCallback'])->name('social.callback');

// Route::get('/login/{provider}/callback', [SocialController::class,'redirectToProvider']);

    Route::middleware(['masyarakatis'])->group(function(){
        Route::post('/Pengaduan', [laporanMasyarakat::class,'storePengaduan'])->name('pengaduan');
        Route::middleware('masyarakatis:masyarakat')->get('/laporan/{siapa?}', [laporanMasyarakat::class,'laporan'])->name('laporan');
    });   

Route::get('/logout', [loginController::class,'logout'])->name('logout');
// google



Route::prefix('admin')->group(function(){

		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dasboard.index');
		Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
		Route::post('getLaporanTanggal',[LaporanController::class,'getLaporan'])->name('cari.laporan');
		Route::post('getLaporanStatus',[LaporanController::class,'status'])->name('cari.status');
		Route::get('cetak/{status}/{from}/{to}',[LaporanController::class,'cetakLaporan'])->name('export.laporan');

		Route::resource('petugas', PetugasController::class);
		Route::resource('masyarakat', MasyarakatController::class);
		Route::resource('pengaduan', PengaduanController::class);
		Route::post('tanggapan',[TanggapanController::class, 'createOrUpdate'])->name('tanggapan');

});

