 @extends('layouts.admin')


@section('title', 'Laporan')
@section('header', 'Laporan Pengaduan')

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-12">
					<div class="card">
						<div class="card-header">
							Cari Berdasarkan Tanggal
						</div>
						<div class="card-body">
							<form action="{{route('cari.laporan')}}" method="POST">
								@csrf
								<div class="form-group">
									<input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
								</div>
								<div class="form-group">
									<input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
								</div>
								<button type="submit" class="btn btn-success" style="width: 100%;">Cari Laporan</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-12">
					<div class="card">
						<div class="card-header">
							<b>Data Berdasarkan Tanggal</b>
							<div class="float-right">
								@if($pengaduan ?? '')
									<a href="{{route('export.laporan',['from'=>$from, 'to'=>$to])}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export Pdf</a>
								@endif
							</div>
						</div>
						<div class="card-body">
							@if($pengaduan ?? '')
								<table class="table table-striped table-bordered">
									<thead class="text-center table-dark">
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Isi Laporan</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($pengaduan as $k => $v)
											<tr>
												<td class="text-center"> {{ $k += 1}}</td>
												<td> {{ $v->tgl_pengaduan }}</td>
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
							@else
								<div class="text-center">
									Tidak ada data
								</div>
							@endif						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection