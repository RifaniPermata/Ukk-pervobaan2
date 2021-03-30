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
							<b>Data Berdasarkan Tanggal</b>
							<div class="float-right">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i> Cari Data</button>
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
		                                    <th>Lokasi Kejadian</th>
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
		                                        <td>{{ $v->tgl_pengaduan }}</td>
		                                        <td>{{ $v->isi_laporan }}</td>
		                                        <td>{{ $v->lokasi_kejadian }}</td>
		                                        <td>{{ $v->tanggapan->petugas->level ?? '' }}</td>
		                                        <td>{{ $v->tanggapan->tgl_tanggapan ?? '' }}</td>
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
									<a href="{{route('export.laporan',['from'=>$from, 'to'=>$to])}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export Pdf</a>
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
	      <div class="modal-header">
	        <!-- <h5 class="modal-title" id="exampleModalLabel">Cari Data</h5> -->
		        <div class="dropdown">
				  <a class=" dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Cari Berdasarkan
				  </a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="#">Tanggal</a>
				    <a class="dropdown-item" href="#">Status</a>
				  </div>
				</div>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="col-lg-8 col-12 container-fluid">
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
			<div class="col-lg-8 col-12 container-fluid">
				<div class="card">
					<div class="card-header">
						Cari Berdasarkan Status
					</div>
					<div class="card-body">
						<form action="{{route('cari.laporan')}}" method="POST">
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

	<script>
	   $(document).ready(function() {
	  // if($(".hide").click(function(){
		$(".hide").click(function(){
		   $(".hide").hide();
		});
	  // }else{
		// $(".show").click(function(){
		//    $("form").show();
		// });
	  // }	  
	   });
   </script>
@endsection