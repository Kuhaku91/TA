@extends('Layout.layout')

@section('title','BK')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/assets/libs/select2/dist/css/select2.min.css')}}">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">PROFIL</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('Bk')}}">Bk</a></li>
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
		<div class="col-md-6">
			<div class="card">
				<form class="form-horizontal" action="{{url('bk')}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Guru BK</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Guru" value="{{$data['user']->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">E-Mail Guru BK</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail Guru" value="{{$data['user']->email}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 text-right control-label col-form-label">Password Guru BK</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="password" name="password" >
							</div>
						</div>
					</div>
					<div class="border-top">
						<div class="card-body">
							<button type="submit" name="data" value="user" class="btn btn-primary">Ubah Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<form class="form-horizontal" action="{{url('bk')}}" method="post">
					@csrf
					<div class="card-body">
						<?php 
						if ($data['profil']->ttl==null) {
							$x = DATE("m/d/Y");
							$data['profil']->ttl = ",".$x;
						}
						$a = explode(',', $data['profil']->ttl); 
						?>
						<div class="form-group row">
							<label for="tmp" class="col-sm-3 text-right control-label col-form-label">Tempat Lahir</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="tmp" name="tmp" placeholder="Tempat Lahir" value="{{$a[0]}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl" class="col-sm-3 text-right control-label col-form-label">Tanggal Lahir</label>
							<div class="col-sm-9 input-group">
								<input type="text" class="form-control mydatepicker" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="{{$a[1]}}">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis_kelamin" class="col-sm-3 text-right control-label col-form-label">Jenis Kelamin</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="jenis_kelamin" name="jenis_kelamin" style="width: 100%; height:36px;">
									<option>Pilih</option>
									<option <?= $data['profil']->jenis_kelamin=='Laki-Laki'? 'selected' : '' ?> value='Laki-Laki' >Laki-Laki</option>
									<option <?= $data['profil']->jenis_kelamin=='Perempuan'? 'selected' : '' ?> value='Perempuan' >Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No Hp Guru BK</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp" value="{{$data['profil']->no_hp}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-3 text-right control-label col-form-label">Alamat Guru BK</label>
							<div class="col-sm-9">								
								<textarea class="form-control" name="alamat" id="alamat">{{$data['profil']->alamat}}</textarea>
							</div>
						</div>
						<!-- {{
							$id_kelas = $data['profil']->kelas_id;
						}} -->
						<div class="form-group row">
							<label for="kelas" class="col-sm-3 text-right control-label col-form-label">Kelas</label>
							<div class="col-sm-9">						
								<select class="select2 form-control custom-select" id="kelas" name="kelas" style="width: 100%; height:36px;">
								</select>
							</div>
						</div>
					</div>
					<div class="border-top">
						<div class="card-body">
							<button type="submit" name="data" value="profil" class="btn btn-primary">Ubah Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<?php 
$data = [];
// $id_kelas = 0;
foreach (\App\Models\Kelas::get() as $key => $value) {
	$data[] = [
		'id'=>$value->id,
		'tahun'=>$value->tahun,
		'kelas'=>$value->kelas,
		'ket'=>$value->ket,
	];
}
?>
@section('js')
<script src="{{asset('asset/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('asset/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('asset/assets/libs/select2/dist/js/select2.min.js')}}"></script>

<script>
	$(".select2").select2();
	$("#kelas").empty()
	$("#kelas").append('<option value="0">Pilih Kelas...</option>');
	$.each({!!json_encode($data)!!},function(key,item){
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
		if (item.id=={!!json_encode($id_kelas)!!}) {
			$('#kelas').append('<option value="'+item.id+'" selected>'+item.ket+' '+roma+' '+kelas[1]+'</option>');
		}
		else{
			$('#kelas').append('<option value="'+item.id+'">'+item.ket+' '+roma+' '+kelas[1]+'</option>');
		}
	});
	jQuery('.mydatepicker').datepicker();
</script>
@endsection