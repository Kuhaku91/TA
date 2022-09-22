@extends('Layout.layout')

@section('title','BK')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('asset/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/assets/libs/quill/dist/quill.snow.css')}}">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">DATA</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('DataSiswa')}}">Data</a></li>
						<!-- <li class="breadcrumb-item"><a href="{{route('DataSiswa')}}">AKUN</a></li> -->
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
					<h4>Data Kelas</h4>
					<div class="row pb-4">
						<div class="col-md-3 col-sm-12">
							<select name="jurusan" id="jurusan" class="form-control">
								<option>Pilih Jurusan</option>
								@foreach($data['kelas'] as $kelas)
								<option value="{{$kelas->ket}}">{{$kelas->ket}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<br>
					<br>
					<div class="table-responsive">
						<h4>Tabel Akun Siswa</h4>
						<table id="zero_config" class="table table-striped table-bordered text-center">
							<thead>
								<tr>
									<th>Nama</th>
									<th>E-Mail</th>
									<th>Kelas</th>
									<!-- <th>Aksi</th> -->
								</tr>
							</thead>
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
<script src="{{asset('asset/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
	var jur = '';
	$(document).ready(function(){

		$('#zero_config').DataTable({
			ajax:{
				url:"{{ url('get_datasiswa') }}"+'?jurusan='+jur,
				type:'get',
				contentType: 'application/json',
			},
			columns:[
			{data:"name"},
			{data:"email"},
			{data:"kelas"},
			// {data:"id"},
			]
		});

		$('#jurusan').on('change',function(){
			jur = this.value;
			console.log(jur);
			console.log("{{ url('get_datasiswa') }}"+'?jurusan='+jur);
			$('#zero_config').DataTable().ajax.url("{{ url('get_datasiswa') }}"+'?jurusan='+jur).load();
			console.log(jur);
		});
	});
	
</script>
@endsection