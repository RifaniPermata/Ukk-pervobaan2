@extends('layouts.admin')

@section('title', 'Detail Petugas')
@section('header', 'Form Tambah Petugas')

@section('header2')
    <li class="breadcrumb-item active"> <a href="{{ route('petugas.index') }}">Detail Petugas</a></li>
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
		        <div class="col-lg-9 container col-12">
		        	@if (Session::has('username'))
			                <div class="alert alert-danger">
			                    {{ Session::get('username') }}
			                </div>			        
			        @elseif ($errors->any())
			            @foreach ($errors->all() as $error)
			                <div class="alert alert-danger">
			                    {{ $error }}
			                </div>
			            @endforeach
			        @endif
		            <div class="card">
		                <div class="card-header">
		                    Form Tambah Petugas
		                </div>
		                <div class="card-body">
		                    <form action="{{ route('petugas.store') }}" method="POST">
		                        @csrf
		                        <div class="form-group">
		                            <label for="nama_petugas">Nama Petugas</label>
		                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="username">Username</label>
		                            <input type="text" name="username" id="username" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="password">Password</label>
		                            <input type="password" name="password" id="password" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="telp">No Telp</label>
		                            <input type="number" name="telp" id="telp" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="level">Level</label>
		                            <div class="input-group mb-3">
		                                <select name="level" id="level" class="custom-select">
		                                    <option value="petugas" selected>Pilih Level (Default Petugas)</option>
		                                    <option value="admin">Admin</option>
		                                    <option value="petugas">Petugas</option>
		                                </select>
		                            </div>
		                        </div>
		                        <button type="submit" class="btn btn-success" style="width: 100%">SIMPAN</button>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>		
	</section>
@endsection
