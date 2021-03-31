 @extends('layouts.admin')


@section('title', 'Detail Pengaduan')
@section('header', 'Pengaduan Masyarakat')
@section('header2')
    <li class="breadcrumb-item active"> <a href="{{ route('pengaduan.index') }}">Detail Pengaduan</a></li>
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="card">
						<div class="card-header bg-danger text-center">
							<b>Pengaduan Masyarakat</b>
						</div>
						<div class="card-body table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<th>NIK</th>
										<td>:</td>
										<td>{{$pengaduan->nik}}</td>
									</tr>
									<tr>
										<th>Nama Masyarakat</th>
										<td>:</td>
										<td>{{$pengaduan->user->nama}}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td>:</td>
										<td>{{$pengaduan->user->email}}</td>
									</tr>
									<tr>
										<th>Isi Laporan</th>
										<td>:</td>
										<td>{{$pengaduan->isi_laporan}}</td>
									</tr>
									<tr>
										<th>Tanggal Pengaduan</th>
										<td>:</td>
										<td>{{tanggalIndonesia($pengaduan->tgl_pengaduan)}}</td>
									</tr>
									<tr>
										<th>Lokasi</th>
										<td>:</td>
										<td>{{$pengaduan->lokasi_kejadian}}</td>
									</tr>
									<tr>
										<th>Kategori</th>
										<td>:</td>
										<td>{{$pengaduan->kategori_kejadian}}</td>
									</tr>
									<tr>
										<th>Foto</th>
										<td>:</td>
										<td><img src="{{Storage::url($pengaduan->foto)}}" alt="foto pengaduan" class="embed-responsive"></td>
									</tr>
									<tr>
										<th>Status</th>
										<td>:</td>
										<td>
											@if($pengaduan->status == '0')
												<a href="#" class="badge badge-danger">Pending</a>
											@elseif($pengaduan->status == 'proses')
												<a href="#" class="badge badge-warning">proses</a>
											@else
												<a href="#" class="badge badge-success">selesai</a>
											@endif
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>					
				</div>
				<div class="col-lg-6 col-12">
					<div class="card">
						<div class="card-header bg-danger text-center">
							<b>Tanggapan Petugas</b>
						</div>
						<div class="card-body">
							<form action="{{route('tanggapan')}}" method="POST">
								@csrf
								<input type="hidden" name="id_pengaduan" value="{{$pengaduan->id_pengaduan}}">
								<div class="form-group">
									<label for="status">Status</label>
									<div class="input-group mb-3">
										<select name="status" id="status" class="custom-select">
											@if ($pengaduan->status == '0')
												<option selected value="0">Pending</option>
												<option value="proses">Proses</option>
												<option value="selesai">Selesai</option>
											@elseif($pengaduan->status == 'proses')
												<option value="0">Pending</option>
				                                <option selected value="proses">Proses</option>
				                                <option value="selesai">Selesai</option>
				                            @else
			                                    <option value="0">Pending</option>
			                                    <option value="proses">Proses</option>
			                                    <option selected value="selesai">Selesai</option>
			                                @endif
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggapan">Tanggapan</label>
									<textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan" >{{$tanggapan->tanggapan ?? ''}}</textarea>
								</div>
								<button type="submit" class="btn btn-block btn-success">KIRIM</button>
							</form>
							@if(Session::has('status'))
							<div class="alert alert-success mt-2">
								{{Session::get('status')}}
							</div>
							@endif
						</div>
					</div>					
				</div>
			</div>
		</div>		
	</section>

@endsection
