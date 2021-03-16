 @extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
{{--section hitungan --}}
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

{{--section liat pengaduan--}}
	<section class="content mt-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table id="pengaduanTable" class="table" >
						        <thead>
									<tr>
										<th>NO</th>
										<th>Tanggal</th>
										<th>Isi laporan</th>
										<th>Status</th>										
									</tr>
								</thead>
								<tbody>
									@foreach($pengaduan as $k=>$v)
									<tr>
										<td> {{ $k += 1}}</td>
										<td> {{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
										<td> {{ $v->isi_laporan }}</td>
										<td>
											@if($v->status == '0')
											<a href="#" class="badge badge-danger">Pending</a>
											@elseif($v->status == 'proses')
											<a href="#" class="badge badge-warning">proses</a>
											@else
											<a href="#" class="badge badge-success">selesai</a>
											@endif
										</td>

									@endforeach
								</tbody>						        
						    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection