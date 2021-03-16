<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(){
		return view('admin.Petugas.index');
	}

	public function create(){
		return view('admin.Petugas.create');
	}

	public function store(Request $request){
		// return view('admin.Petugas.index');
	}

	public function edit($id_petugas){
		return view('admin.Petugas.edit');
	}

	public function update(Request $request, $id_petugas){
		// return view('admin.Petugas.index');
	}

	public function destroy($id_petugas){
		
	}
}
