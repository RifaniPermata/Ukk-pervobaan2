 @extends('layouts.admin')

@section('css')

	  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
@endsection

@section('title', 'Pengaduan')
@section('header', 'Data Pengaduan')
@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table id="pengaduanTable" class="table table-striped table-bordered" >
						        <thead class="table-dark text-center">
									<tr>
										<th>NO</th>
										<th>Tanggal</th>
										<th>Isi laporan</th>
										<th>Status</th>
										<th>Detail</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pengaduan as $k=>$v)
									<tr>
										<td class="text-center"> {{ $k += 1}}</td>
										<td> {{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
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
										<td class="text-center">
											<button class="btn btn-info">
											<a href="{{route('pengaduan.show', $v->id_pengaduan)}}" class="text-dark"><i class="fas fa-eye"></i> Lihat</a>
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
	{{-- <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}
	<script>
		$(document).ready(function() {
		    $('#pengaduanTable').DataTable();
		} );
		// $(document).ready(function() {
		//     $('#pengaduanTable').DataTable();
		// } );
		
	</script>
@endsection