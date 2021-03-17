 @extends('layouts.admin')


@section('title', 'Detail Masyarakat')
@section('header', 'Data Masyarakat')
@section('header2')
    <li class="breadcrumb-item active"> <a href="{{ route('masyarakat.index') }}">Detail Masyarakat</a></li>
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 col-12 mt-5 container">
					<div class="card">
						<div class="card-header text-center">
							<b>Detail Masyarakat</b>
						</div>
						<div class="card-body">
							<table class="table">
								<tbody>
									<tr>
										<th>NIK</th>
										<td>:</td>
										<td>{{$masyarakat->nik}}</td>
									</tr>
									<tr>
										<th>Nama</th>
										<td>:</td>
										<td>{{$masyarakat->nama}}</td>
									</tr>
									<tr>
										<th>Username</th>
										<td>:</td>
										<td>{{$masyarakat->username}}</td>
									</tr>
									<tr>
										<th>Telp</th>
										<td>:</td>
										<td>{{$masyarakat->telp}}</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
