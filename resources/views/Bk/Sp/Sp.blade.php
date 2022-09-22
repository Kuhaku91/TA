@extends('Layout.layout')

@section('title','BK')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Surat Peringatan</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('BkSP')}}">SP</a></li>
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
									<td>Nama</td>
									<td>Mendapat</td>
									<td>Total Point</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								@foreach($data['siswa'] as $siswa)
								<tr>
									<td>{{$siswa->name}}</td>
									<td>{{$siswa->dapatsp($siswa->id,$siswa->point($siswa->id))}}</td>
									<td>{{$siswa->point($siswa->id)}}</td>
									<td>
										@if($siswa->point($siswa->id)!=0)
										<form action="{{url('bk/sp')}}" method="post">
											@csrf
											<button type="submit" name="sp" value="{{$siswa->id}}-sp1" class="btn btn-sm <?= $siswa->status($siswa->id)=='sp1' ? 'btn-success' : 'btn-info' ?> ">SP 1</button>
											<button type="submit" name="sp" value="{{$siswa->id}}-sp2" class="btn btn-sm <?= $siswa->status($siswa->id)=='sp2' ? 'btn-success' : 'btn-info' ?> ">SP 2</button>
											<button type="submit" name="sp" value="{{$siswa->id}}-sp3" class="btn btn-sm <?= $siswa->status($siswa->id)=='sp3' ? 'btn-success' : 'btn-info' ?> ">SP 3</button>
											<button type="submit" name="sp" value="{{$siswa->id}}-batal" class="btn btn-sm <?= $siswa->status($siswa->id)=='batal' ? 'btn-success' : 'btn-info' ?> ">BATAL</button>
										</form>
										@else
										<button class="btn btn-sm btn-primary">BELUM MENDAPAT POINT</button>
										@endif
									</td>
								</tr>
								@endforeach
								@foreach($data['guru'] as $guru)
								<tr>
									<td>{{$guru->name}}</td>
									<td>{{$guru->dapatsp($guru->id,$guru->point($guru->id))}}</td>
									<td>{{$guru->point($guru->id)}}</td>
									<td>
										@if($guru->point($guru->id)!=0)
										<form action="{{url('bk/sp')}}" method="post">
											@csrf
											<!-- {{$guru->id}}{{$guru->point($guru->id)}} -->
											<!-- {{$guru->checksp($guru->id,$guru->point($guru->id),'sp1')}} -->
											@if($guru->checksp($guru->id,$guru->point($guru->id),'sp1'))
											@endif
											@if($guru->checksp($guru->id,$guru->point($guru->id),'sp2'))
											@endif
											@if($guru->checksp($guru->id,$guru->point($guru->id),'sp3'))
											@endif
											@if($guru->checksp($guru->id,$guru->point($guru->id),'batal'))
											@endif
											<button type="submit" name="sp" value="{{$guru->id}}-sp1" class="btn btn-sm <?= $guru->status($guru->id)=='sp1' ? 'btn-success' : 'btn-info' ?> ">SP 1</button>
											<button type="submit" name="sp" value="{{$guru->id}}-sp2" class="btn btn-sm <?= $guru->status($guru->id)=='sp2' ? 'btn-success' : 'btn-info' ?> ">SP 2</button>
											<button type="submit" name="sp" value="{{$guru->id}}-sp3" class="btn btn-sm <?= $guru->status($guru->id)=='sp3' ? 'btn-success' : 'btn-info' ?> ">SP 3</button>
											<button type="submit" name="sp" value="{{$guru->id}}-batal" class="btn btn-sm <?= $guru->status($guru->id)=='batal' ? 'btn-success' : 'btn-info' ?> ">BATAL</button>
										</form>
										@else
										<button class="btn btn-sm btn-primary">BELUM MENDAPAT POINT</button>
										@endif
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
</div>
@endsection

@section('js')
<script src="{{asset('asset/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
	$('#zero_config').DataTable();
</script>
@endsection