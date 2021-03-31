 @extends('layouts.admin')


@section('title', 'Laporan')
@section('header', 'Laporan Pengaduan')

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<b>Exsport Data</b>
							<div class="float-right">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i> Cari Data</button>
							</div>
						</div>
						<div class="card-body table-responsive">
							@if($pengaduan ?? '')
								<table class="table table-hover table-striped table-bordered">
									<thead class="text-center bg-danger">
										<tr>
											<th>No</th>
											<th>Nama Masyarakat</th>
		                                    <th>Tanggal Pengaduan</th>
		                                    <th>Isi Laporan</th>
		                                    <th>Lokasi Kejadian</th>
		                                    <th>Nama Petugas</th>
		                                    <th>Tanggapan Dari</th>
		                                    <th>Tanggal Tanggapan</th>
		                                    <th>Isi Tanggapan</th>
		                                    <th>Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($pengaduan as $k => $v)
											<tr>
												<td>{{ $k += 1 }}</td>
		                                        <td>{{ $v->user->nama }}</td>
		                                        <td>{{ tanggalIndonesia($v->tgl_pengaduan) }}</td>
		                                        <td>{{ $v->isi_laporan }}</td>
		                                        <td>{{ $v->lokasi_kejadian }}</td>
		                                        <td>{{ $v->tanggapan->petugas->nama_petugas ?? '' }}</td>
		                                        <td>{{ $v->tanggapan->petugas->level ?? '' }}</td>
		                                        <td>{{ tanggalIndonesia($v->tanggapan->tgl_tanggapan ?? '' ) }}</td>
		                                        <td>{{ $v->tanggapan->tanggapan ?? '' }}</td>
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
						<div class="card-footer ">
							<div class="float-right">
								@if($pengaduan ?? '')

									<a href="{{route('export.laporan',['status' => $statusExport ?? 'date','from'=>$from, 'to'=>$to])}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export Pdf</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Modal -->
	<!-- Button trigger modal -->
<!-- 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	  Launch demo modal
	</button> -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-danger">
	        <!-- <h5 class="modal-title" id="exampleModalLabel">Cari Data</h5> -->
		        <div class="dropdown">
				  <a class="dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<strong> Cari Berdasarkan </strong>
				  </a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a id="searchByTanggal" class="dropdown-item" href="#">Tanggal</a>
				    <a id="searchByStatus" class="dropdown-item" href="#">Status</a>
				  </div>
				</div>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="col-lg-8 col-12 container-fluid">
	      <!-- 	<button id="searchByTanggal" class="btn btn-success">Tanggal</button>
	      	<button id="searchByStatus" class="btn btn-success">Status</button> -->
				<div class="card" id="tanggal-card">
					<div class="card-header bg-danger">
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
			<div class="col-lg-8 col-12 container-fluid">
				<div class="card" id="status-card">
					<div class="card-header bg-danger">
						Cari Berdasarkan Status
					</div>
					<div class="card-body">
						<form action="{{route('cari.status')}}" method="POST">
							@csrf
							<select name="status" id="status" class="custom-select">
									<option value="0">Pending</option>
									<option value="proses">Proses</option>
									<option value="selesai">Selesai</option>
							</select>
							<button type="submit" class="btn btn-success mt-3" style="width: 100%;">Cari Laporan</button>
						</form>
					</div>
				</div>
			</div>
	      </div>
	    </div>
	  </div>
	</div>


@endsection
@section('js')
	<script>
	   $(document).ready(function() {
	   		$("#status-card").hide()
			$("#searchByStatus").click(function(){
				$("#status-card").show()
				$("#tanggal-card").hide()
			})
			$("#searchByTanggal").click(function(){
				$("#tanggal-card").show()
				$("#status-card").hide()
			}) 
	   });
   </script>
@endsection