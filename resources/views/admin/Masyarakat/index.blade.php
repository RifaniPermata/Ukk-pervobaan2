@extends('layouts.admin')

@section('css')
	  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('title', 'Masyarakat')
@section('header', 'Data Masyarakat')

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class=" card-body table-responsive">
							<table id="masyarakatTable" class="table table-hover table-striped table-bordered" >
						        <thead  class="bg-danger text-center">
									<tr>
										<th>No</th>
										<th>NIK</th>
						                <th>Nama</th>
						                <th>Username</th>
						                <th>Telp</th>
						                <th>Detail</th>
									</tr>
								</thead>
								<tbody>
									@foreach($masyarakat as $k=>$v)
									<tr>
										<td class="text-center"> {{ $k += 1}}</td>
										<td> {{ $v->nik }}</td>
										<td> {{ $v->nama }}</td>
										<td> {{ $v->username }}</td>
										<td> {{ $v->telp }}</td>
										
										<td class="text-center">
											<button class="btn btn-info">
											<a href="{{route('masyarakat.show', $v->nik)}}" class="text-white"><i class="fas fa-eye"></i></a>
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
		    $('#masyarakatTable').DataTable();
		} );
	</script>
@endsection

