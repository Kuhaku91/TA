@extends('Layout.layout')

@section('title','SISWA')

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
						<li class="breadcrumb-item"><a href="{{route('SiswaKonseling')}}">Konseling</a></li>
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
		<div class="col-md-4">
			<div class="card">
				<form class="form-horizontal" action="{{url('siswa/konseling/')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<h4 class="card-title">Mengajukan Konseling</h4>
						<div class="form-group row">
							<label for="id_guru" class="col-sm-3 text-right control-label col-form-label">Pilih Guru BK</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="id_guru" name="id_guru" style="width: 100%; height:36px;">
									<option>Pilih nama Guru BK</option>
									@foreach($data['guru'] as $guru)
									<option value="{{$guru->id}}">{{$guru->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="ket" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="ket" name="ket" placeholder="Keterangan Bimbingan"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis_konseling" class="col-sm-3 text-right control-label col-form-label">Jenis Bimbingan</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="jenis_konseling" name="jenis_konseling" style="width: 100%; height:36px;">
									<option>Pilih Jenis Bimbingan</option>
									<option value="bimkel">Bimbingan Kelompok</option>
									<option value="bimpri">Bimbingan Pribadi</option>
									<option value="bimjen">Bimbingan Kuliah / Jenjang Selanjutnya</option>
									<option value="bimsek">Bimbingan Tentang Sekolah</option>
									<option value="bimbel">Bimbingan Belajar</option>
									<option value="bimmas">Bimbingan Masalah Keluarga</option>
								</select>
							</div>
						</div>
					</div>
					<div class="border-top">
						<div class="card-body">
							<button type="submit" class="btn btn-primary">Ajukan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-8">
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
									<th>Guru BK</th>
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
										<a href="{{ url('siswa/konseling',$konseling->id) }}" class="btn btn-info btn-sm">Chat</a>
										@else
										<button class="btn btn-primary btn-sm">Menunggu Verifikasi</button>
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