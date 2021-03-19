 @extends('layouts.admin')

@section('css')

	  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('title', 'Petugas')
@section('header', 'Data Petugas')

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
								<a href="{{ route('petugas.create') }}" class="btn btn-success float-right">Tambah Petugas</a>
						</div>
						<div class="card-body">   					
							<table id="tanggapanTable" class="table table-striped table-bordered" >
						        <thead  class="table-dark text-center">
									<tr>
										<th>No</th>
										<th>Nama Petugas</th>
						                <th>Username</th>
						                <th>Telp</th>
						                <th>Level</th>
						                <th>Detail</th>
									</tr>
								</thead>
								<tbody>
									@foreach($petugas as $k=>$v)
									<tr>
										<td class="text-center"> {{ $k += 1}}</td>
										<td> {{ $v->nama_petugas }}</td>
										<td> {{ $v->username }}</td>
										<td> {{ $v->telp }}</td>
										<td> {{ $v->level }}</td>
										
										<td class="text-center">
											<button class="btn btn-info">
											<a href="{{route('petugas.edit', $v->id_petugas)}}" class="text-dark"><i class="fas fa-eye"></i> Lihat</a>
											</button>
										</td>
									</tr>
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


@section('js')

	<!-- DataTables  & Plugins -->
	<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

	<script>
		$(document).ready(function() {
		    $('#tanggapanTable').DataTable();
		} );
		// $(document).ready(function() {
		//     $('#pengaduanTable').DataTable();
		// } );
		
	</script>
@endsection
