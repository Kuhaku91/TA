@extends('Layout.layout')

@section('title','BK')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Konseling</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('BkKonseling')}}">Konseling</a></li>
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
									<th>Nama</th>
									<th>Kelas</th>
									<th>Keterangan Konseling</th>
									<th>Jenis Konseling</th>
									<th>Tanggal Pengajuan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['konseling'] as $konseling)
								<tr>
									<td>{{$konseling->name}}</td>
									<td>
										<?php 
										$a = explode(' ',$konseling->kelas);
										$b = DATE('Y',time()+60*60*7);
										$c = $b-$konseling->tahun+10;
										$d = '';
										if ($c=='10') {
											$d = "X";
										}
										else if ($c=='11') {
											$d = "XI";
										}
										else if ($c=='12') {
											$d = "XII";
										}
										echo $konseling->ket.' '.$d.' '.$a[1];
										?>
									</td>
									<td>{{$konseling->ket}}</td>
									<td>
										@if($konseling->jenis_konseling=='bimkel')
										Bimbingan Kelompok
										@elseif($konseling->jenis_konseling=='bimpri')
										Bimbingan Pribadi
										@elseif($konseling->jenis_konseling=='bimjen')
										Bimbingan Kuliah / Jenjang Selanjutnya
										@elseif($konseling->jenis_konseling=='bimsek')
										Bimbingan Tentang Sekolah
										@elseif($konseling->jenis_konseling=='bimbel')
										Bimbingan Belajar
										@elseif($konseling->jenis_konseling=='bimmas')
										Bimbingan Masalah Keluarga
										@endif
									</td>
									<td>
										{{ $konseling->created_at }}
									</td>
									<td>
										@if($konseling->verif=='s')
										<a href="{{ url('bk/konseling',$konseling->id) }}" class="btn btn-info btn-sm">Chat</a>
										@else
										<a href="{{ url('bk/konseling/verif',$konseling->id) }}" class="btn btn-primary btn-sm">Verifikasi</a>
										<a href="{{ url('bk/konseling/tolak',$konseling->id) }}" class="btn btn-warning btn-sm">Tolak</a>
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