@extends('Layout.layout')

@section('title','BK')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Melaporkan</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('BkPoint')}}">Lapor</a></li>
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
					<div class="row pb-4">
						<div class="col-md-3 col-sm-12">
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
									<th>Nama Pelapor</th>
									<th>Nama yang Dilaporkan</th>
									<th>Kesalahan</th>
									<th>Beban</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['lapor'] as $lapor)
								<tr>
									<td>
										{{$lapor->pe}}
										<a href="{{ url('bk/plapor',$lapor->id) }}" class="btn btn-info btn-sm">Chat Pelapor</a>
									</td>
									<td>{{$lapor->di}}</td>
									<td>{{$lapor->ur}}</td>
									<td>{{$lapor->beban}}</td>
									<td>{{$lapor->ket}}</td>
									<td>
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Detail{{$lapor->id}}">
											Cek Bukti
										</button>
										@if($lapor->verif=='s')
										<a href="{{ url('bk/lapor',$lapor->id) }}" class="btn btn-info btn-sm">Chat</a>
										@else
										<a href="{{ url('bk/lapor/verif',$lapor->id) }}" class="btn btn-primary btn-sm">Verifikasi</a>
										<a href="{{ url('bk/lapor/tolak',$lapor->id) }}" class="btn btn-warning btn-sm">Tolak</a>
										@endif
									</td>
									@include('Bk.Lapor.detail')
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
<script>
	$('#zero_config').DataTable();
</script>
@endsection