<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(){
		return view('admin.Masyarakat.index');
	}

	public function show($nik){
		return view('admin.Masyarakat.show');

	}
}
