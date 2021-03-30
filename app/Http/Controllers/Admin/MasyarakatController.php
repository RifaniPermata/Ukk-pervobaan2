<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
	public function __construct()
    {
        $this->middleware('cekLevel:admin,petugas');
    }
    
    public function index(){
   	$masyarakat =Masyarakat::all();

		return view('admin.Masyarakat.index',['masyarakat'=>$masyarakat]);
	}

	public function show($nik){
	 	$masyarakat = Masyarakat::where('nik',$nik)->first();

		return view('admin.Masyarakat.show',['masyarakat'=>$masyarakat]);

	}
}
