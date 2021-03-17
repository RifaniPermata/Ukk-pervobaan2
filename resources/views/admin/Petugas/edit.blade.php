@extends('layouts.admin')

@section('title', 'Detail Petugas')
@section('header', 'Form Edit Petugas')

@section('header2')
    <li class="breadcrumb-item active"> <a href="{{ route('petugas.index') }}">Detail Petugas</a></li>
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
		        <div class="col-lg-9 container col-12">
		        	@if (Session::has('notif'))
			                <div class="alert alert-danger">
			                    {{ Session::get('notif') }}
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
		                    Form Edit Petugas
		                </div>
		                <div class="card-body">
		                    <form action="{{ route('petugas.store') }}" method="POST">
		                        @csrf
		                        <div class="form-group">
		                            <label for="nama_petugas">Nama Petugas</label>
		                            <input type="text" value="{{$petugas->nama_petugas}}"  name="nama_petugas" id="nama_petugas" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="username">Username</label>
		                            <input type="text" value="{{$petugas->username}}"  name="username" id="username" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="password">Password</label>
		                            <input type="password" name="password" id="password" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="telp">No Telp</label>
		                            <input type="number" value="{{$petugas->telp}}"  name="telp" id="telp" class="form-control" required>
		                        </div>
		                        <div class="form-group">
		                            <label for="level">Level</label>
		                            <div class="input-group mb-3">
		                                <select name="level" id="level" class="custom-select">
		                                    @if ($petugas->level == 'admin')                                 
		                                    <option selected value="admin">Admin</option>
		                                    <option value="petugas">Petugas</option>
		                                    @else
		                                    <option value="admin">Admin</option>
		                                    <option selected value="petugas">Petugas</option>
		                                    @endif
		                                </select>
		                            </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-lg-6 mt-2">
		                        		<button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
		                        	</div>
		                    </form>	
		                    <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST" class="col-lg-6">
		                        @csrf
		                        @method('DELETE')
		                        <button type="submit" class="btn btn-danger mt-2" style="width: 100%"S>HAPUS</button>
		                    </form> 
		                    </div>                
		                </div>
		            </div>
		        </div>
		    </div>
		</div>		
	</section>
@endsection
