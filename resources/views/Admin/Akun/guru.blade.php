@extends('Layout.layout')

@section('title','ADMIN')

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
						<li class="breadcrumb-item"><a href="{{route('AdminAkun')}}">AKUN</a></li>
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
							<button type="button" class="btn btn-warning btn-block p-2" data-toggle="modal" data-target="#Guru">
								TAMBAH GURU
							</button>
							@include('Admin.Akun.Tambah.guru')
						</div>
					</div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-striped table-bordered text-center">
							<thead>
								<tr>
									<th>Nama</th>
									<th>E-Mail</th>
									<th>Password</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<!-- @if(count($data['kelas']))
								ok
								@else
								eko
								@endif -->
								@foreach($data['user'] as $user)
								<tr>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->password}}</td>
									<td>
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Edit{{$user->id}}">
											Detail Data
										</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Hapus{{$user->id}}">
											Hapus Data
										</button>
									</td>
								</tr>
								@include('Admin.Akun.edit')
								@include('Admin.Akun.hapus')
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
<script src="{{asset('asset/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
	jQuery('.mydatepicker').datepicker();
	
	$('#zero_config').DataTable();
	$(document).ready(function(){

		$('#kelas').hide();
		$('#jurusan').on('change',function(){
			$('#kelas').show();
			console.log('bo');
			$.ajax({
				url:"{{ url('getkelas') }}",
				type:"GET",
				data: { jurusan:$(this).val() },
				success:function(html){
					$('#kelas_id').empty()
					$('#kelas_id').append('<option value="">Pilih Kelas</option>')
					$.each(html.data,function(key,item){
						var kelas = item.kelas.split(" ")
						const t = new Date()
						const tahun = parseInt(t.getFullYear())-parseInt(item.tahun)+parseInt(10)
						var roma = ""
						if (tahun=='10') {
							roma = "X"
						}
						else if (tahun=='11') {
							roma = "XI"
						}
						else if (tahun=='12') {
							roma = "XII"
						}
						$('#kelas_id').append('<option value="'+item.id+'">'+roma+' '+kelas[1]+'</option>')
					})
				}
			});
		});

	});

	
</script>
@endsection