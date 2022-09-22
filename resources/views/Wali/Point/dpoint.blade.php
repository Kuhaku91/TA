@extends('Layout.layout')

@section('title','WALI')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">POINT</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('DataWaliPoint')}}">POINT</a></li>
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
	<!-- ============================================================== -->
	<!-- Sales Cards  -->
	<!-- ============================================================== -->
	<div class="row">
		<!-- Column -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row pb-4">
						<div class="col-md-3 col-sm-12">
							<p class="btn btn-info btn-block p-2" data-toggle="modal" data-target="#Tambah">
								TOTAL POINT {{$data['total_point']}}
							</p>
						</div>
						<div class="col-md-3 col-sm-12">
						</div>
						<div class="col-md-3 col-sm-12">
						</div>
						<div class="col-md-3 col-sm-12">
						</div>
					</div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-striped table-bordered text-center">
							<thead>
								<tr>
									<th>Point</th>
									<th>Uraian</th>
									<th>Keterangan</th>
									<th>Tanggal</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['lapor'] as $lapor)
								<tr>
									<td>{{$lapor->beban}}</td>
									<td>{{$lapor->ur}}</td>
									<td>{{$lapor->ket}}</td>
									<td>{{$lapor->tgl}}</td>
									<td>
										<a href="{{url('wali/point',$lapor->id)}}" class="btn btn-success margin-5">
											Chat
										</a>
										<button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Detail{{$lapor->id}}">
											Bukti
										</button>
									</td>
									@include('Wali.Point.detail')
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Column -->
	</div>
	<!-- ============================================================== -->
	<!-- Recent comment and chats -->
	<!-- ============================================================== -->
</div>
@endsection

@section('js')
<script src="{{asset('asset/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
	$('#zero_config').DataTable();
</script>
@endsection