<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index(){
    $petugas =Petugas::all()->count();
   	$masyarakat =Masyarakat::all()->count();
   	$proses =Pengaduan::where('status','proses')->get()->count();
   	$selesai =Pengaduan::where('status','selesai')->get()->count();
   	$pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();


   	return view('admin.Dashboard.dashboard',['petugas'=>$petugas, 'masyarakat'=>$masyarakat,'proses'=>$proses,'selesai'=>$selesai, 'pengaduan'=>$pengaduan]);
   }
}
