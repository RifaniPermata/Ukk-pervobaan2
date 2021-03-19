<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Masyarakat\laporanMasyarakat;
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

// Route::get('/', function () {
//     return view('index');
// });
// Route::post('/masyarakat/sendverification', [LoginController::class, 'sendVerification'])->name('sendVerification');
// Route::get('/masyarakat/verify/{nik}', [LoginController::class, 'verify'])->name('verify');

Route::get('/', [LoginController::class, 'index'])->name('view.index');
Route::post('/register', [LoginController::class,'register'])->name('formRegister');

Route::post('/login', [LoginController::class,'login'])->name('login');
// Route::get('/login/{provider}', [SocialController::class,'redirectToProvider']);
// Route::get('login/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

// Route::get('/login/{provider}/callback', [SocialController::class,'redirectToProvider']);

Route::post('/Pengaduan', [laporanMasyarakat::class,'storePengaduan'])->name('pengaduan');
Route::get('/laporan/{siapa?}', [laporanMasyarakat::class,'laporan'])->name('laporan');

Route::get('/logout', [loginController::class,'logout'])->name('logout');

Route::prefix('admin')->group(function(){
	Route::group(['middleware'=> ['auth:admin','cekLevel:admin']],function()
	{
	// Route::middleware(['auth','cekLevel:admin,petugas'])->group(function(){
		Route::resource('petugas', PetugasController::class);
		Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
		Route::post('getLaporan',[LaporanController::class,'getLaporan'])->name('cari.laporan');
		Route::get('cetak/{from}/{to}',[LaporanController::class,'cetakLaporan'])->name('export.laporan');
	// });

	});

// });
	Route::group(['middleware'=> ['auth:admin','cekLevel:admin,petugas']],function()
	{
	// Route::middleware(['petugasMiddleware'])->group(function(){
		Route::resource('masyarakat', MasyarakatController::class);
		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dasboard.index');
		Route::resource('pengaduan', PengaduanController::class);
		Route::post('tanggapan',[TanggapanController::class, 'createOrUpdate'])->name('tanggapan');
	// });
	});

});

