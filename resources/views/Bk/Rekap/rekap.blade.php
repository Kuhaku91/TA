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
					<h4>Cetak Rekap Point</h4>
					<div class="row pb-4">
						<div class="col-md-3 col-sm-12">
							<select name="jurusan" id="jurusan" class="form-control">
								<option>Pilih Jurusan</option>
								@foreach($data['kelas'] as $kelas)
								<option value="{{$kelas->ket}}">{{$kelas->ket}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-2 col-sm-12" id="kelas">
							<select name="kelas_id" id="kelas_id" class="form-control">
								<option value="">Pilih Kelas</option>
							</select>
						</div>
						<div class="col-md-3 col-sm-12" id="tanggal">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="tgl" name="tgl" placeholder="Mulai Tanggal Rekap">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12" id="tanggal1">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Akhir Tanggal Rekap">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1 col-sm-12" id="tombol">
							<a href="#" id="ttombol" class="btn btn-success btn-sm">CETAK</a>
						</div>
					</div>
					<br>
					<br>
					<div class="table-responsive">
						<h4>Tabel Siswa Yang Mendapatkan Point</h4>
						<table id="zero_config" class="table table-striped table-bordered text-center">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Kelas</th>
									<th>Point</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['point'] as $point)
								<tr>
									<td>{{$point->name}}</td>
									<td>{{$point->kelas($point->wali)}}</td>
									<td>{{$point->point($point->id)}}</td>
									<td>
										<a href="{{url('drekapsiswa',$point->id)}}" class="btn btn-sm btn-info">DETAIL</a>
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
<script src="{{asset('asset/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>

	$('#zero_config').DataTable();

	$(document).ready(function(){
		$('#kelas').hide();
		$('#tombol').hide();
		$('#tanggal').hide();
		$('#tanggal1').hide();
		$('#jurusan').on('change',function(){
			$('#kelas').show();
			$('#tombol').hide();
			$('#tanggal').hide();
			$('#tanggal1').hide();
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
		$('#kelas_id').on('change',function(){
			$('#tombol').hide();
			$('#tanggal').show();
			$('#tanggal1').hide();
		});
		$('#tgl').datepicker({
			autoclose:true,
            todayHighlight: true
		});
		$('#tgl').on('change',function(){
			$('#tombol').hide();
			$('#tanggal1').show();
		});
		$('#tgl1').datepicker({
			autoclose:true,
            todayHighlight: true
		});
		$('#tgl1').on('change',function(){
			$('#tombol').show();
			var a = $('#kelas_id').val();
			var t = $('#tgl').val();
			var t1 = $('#tgl1').val();
			console.log(parseInt(a));
			$('#ttombol').attr("href",'{{url("crekapsiswa")}}'+"/"+a+"?tgl="+t+"&tgl1="+t1);
			$('#ttombol').attr("target","_blank");
		});

	});
</script>
@endsection