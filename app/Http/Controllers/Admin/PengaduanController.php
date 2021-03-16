<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
     public function index(){
	 	return view('admin.Pengaduan.index');
	 }

	 public function show($id_pengaduan){

	 }
}
