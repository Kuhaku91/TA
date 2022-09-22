@extends('Layout.layout')

@section('title','BK')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('asset/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Rekap Point</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('RekapSiswa')}}">Rekap</a></li>
						<!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<h4>Tabel Detail Point Siswa {{$data['siswa']->name}}</h4>
						<table id="zero_config" class="table table-striped table-bordered text-center">
							<thead>
								<tr>
									<th>Dilaporkan</th>
									<th>Ket Point</th>
									<th>Point</th>
									<th>Dilaporkan pada</th>
									<th>Disetujui pada</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['point'] as $point)
								<tr>
									<td>{{$point->ket}}</td>
									<td>{{$point->pket}}</td>
									<td>{{$point->beban}}</td>
									<td>{{$point->created_at}}</td>
									<td>{{$point->updated_at}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('asset/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('asset/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
	jQuery('.mydatepicker').datepicker();

	$('#zero_config').DataTable();
	$(document).ready(function(){

	});
</script>
@endsection