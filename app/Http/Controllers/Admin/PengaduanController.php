<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;



class PengaduanController extends Controller
{
	public function __construct()
    {
        $this->middleware('cekLevel:admin,petugas');
    }
    
     public function index(){
   		$pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

	 	return view('admin.Pengaduan.index', ['pengaduan'=>$pengaduan]);
	 }

	 public function show($id_pengaduan){
	 	$pengaduan = Pengaduan::where('id_pengaduan',$id_pengaduan)->first();
 		$tanggapan = Tanggapan::where('id_pengaduan',$id_pengaduan)->first();
        // dd($pengaduan);
 		return view('admin.Pengaduan.show',['pengaduan'=>$pengaduan, 'tanggapan'=>$tanggapan]);

	 }
}
