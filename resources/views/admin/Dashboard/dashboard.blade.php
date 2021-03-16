 @extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
	         	<div class="col-12 col-sm-6 col-md-3">
		            <div class="info-box mb-3">
		              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-bullhorn"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Petugas</span>
		                <span class="info-box-number">{{$petugas}}</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		        </div>
		        <div class="col-12 col-sm-6 col-md-3">
		            <div class="info-box mb-3">
		              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Masyarakat</span>
		                <span class="info-box-number">{{$masyarakat}}</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		        </div>
		        <div class="col-12 col-sm-6 col-md-3">
		            <div class="info-box mb-3">
		              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-bullhorn"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Pengaduan Proses</span>
		                <span class="info-box-number">{{$proses}}</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		        </div>
		        <div class="col-12 col-sm-6 col-md-3">
		            <div class="info-box mb-3">
		              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bullhorn"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Pengaduan Selesai</span>
		                <span class="info-box-number">{{$selesai}}</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		        </div>
        	</div>
		</div>
	</section>

@endsection