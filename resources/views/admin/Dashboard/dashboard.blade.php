 @extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
{{--section hitungan --}}
	<section class="content">
		<div class="container-fluid">
		{{--section liat pengaduan--}}
		<div class="col-11">
			<div class="card float-right col-xl-8">
				<div class="card-header">
					<h3 class="card-title"> Data Pengaduan</h3>
					<div class="card-tools">
	                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
	                    <i class="fas fa-minus"></i>
	                  </button>
	                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
	                    <i class="fas fa-times"></i>
	                  </button>
	                </div>
				</div>
				<div class="card-body p-2">
					<table class="table table-striped table-bordered " >
					    <thead class="table-dark text-center">
							<tr>
								<th>NO</th>
								<th>Tanggal</th>
								<th>Lokasi</th>
								<th>Isi laporan</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pengaduan as $k=>$v)
								<tr>
									<td class="text-center"> {{ $k += 1}}</td>
									<td> {{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
									<td> {{ $v->lokasi_kejadian }}</td>
									<td> {{ $v->isi_laporan }}</td>
									<td>
										@if($v->status == '0')
											<a href="#" class="badge badge-danger">Pending</a>
										@elseif($v->status == 'proses')
											<a href="#" class="badge badge-warning text-white">proses</a>
										@else
											<a href="#" class="badge badge-success">selesai</a>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>						        
					</table>
				</div>
			</div>
		{{-- data masyarakat --}}
{{-- 			<div class="card float-right col-lg-8">
				<div class="card-body pb-2">
					<table id="masyarakatTable" class="table table-striped table-bordered" >
					    <thead  class="table-dark text-center">
							<tr>
								<th>No</th>
								<th>NIK</th>
					            <th>Nama</th>
					            <th>Email</th>
					            <th>Username</th>
					            <th>Telp</th>
							</tr>
						</thead>
						<tbody>
							@foreach($masyarakatAll as $k=>$v)
								<tr>
									<td class="text-center"> {{ $k += 1}}</td>
									<td> {{ $v->nik }}</td>
									<td> {{ $v->nama }}</td>
									<td> {{ $v->email }}</td>								
									<td> {{ $v->username }}</td>
									<td> {{ $v->telp }}</td>										
								</tr>
							@endforeach
						</tbody>						        
				    </table>
				</div>
			</div> --}}
		</div>
		{{-- Dassboard --}}
			<ul class="list-unstyled p-2 ">
				<li>
					<div class="col-md-3 text-center ">
			            <div class="info-box mb-4">
			              <span class="info-box-icon bg-primary elevation-3"><i class="fas fa-bullhorn"></i></span>
			              <div class="info-box-content">
			                <h6 class="info-box-text">Petugas</h6>
			                <h5 class="info-box-number">{{$petugas}}</h5>
			              </div>
			              <!-- /.info-box-content -->
		          		</div>
		            <!-- /.info-box -->
		        	</div>
				</li>
				<li>
					<div class="col-md-3 text-center ">
			            <div class="info-box m4-3">
			              <span class="info-box-icon bg-danger elevation-3"><i class="fas fa-users"></i></span>

			              <div class="info-box-content">
			                <h6 class="info-box-text">Masyarakat</h6>
			                <h5 class="info-box-number">{{$masyarakat}}</h5>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			        </div>
		        </li>
		        <li>
		        	<div class="col-md-3 text-center ">
			            <div class="info-box mb-4">
			              <span class="info-box-icon bg-warning elevation-3"><i class="fas fa-bullhorn"></i></span>

			              <div class="info-box-content">
			                <h6 class="info-box-text">Pengaduan Proses</h6>
			                <h5 class="info-box-number">{{$proses}}</h5>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			        </div>
		        </li>
		        <li>
		        	 <div class="col-md-3 text-center ">
			            <div class="info-box mb-4">
			              <span class="info-box-icon bg-success elevation-3"><i class="fas fa-bullhorn"></i></span>

			              <div class="info-box-content">
			                <h6 class="info-box-text">Pengaduan Selesai</h6>
			                <h5 class="info-box-number">{{$selesai}}</h5>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			        </div> 
		        </li>
			</ul>
		</div>
	</section>



@endsection