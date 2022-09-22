@extends('Layout.layout')

@section('title','GURU')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">PROFIL</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('Guru')}}">Guru</a></li>
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
				<form class="form-horizontal" action="{{url('guru')}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Guru</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Guru" value="{{$data['user']->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">E-Mail Guru</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail Guru" value="{{$data['user']->email}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 text-right control-label col-form-label">Password Guru</label>
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
				<form class="form-horizontal" action="{{url('guru')}}" method="post">
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
							<label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No Hp Guru</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp" value="{{$data['profil']->no_hp}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis_kelamin" class="col-sm-3 text-right control-label col-form-label">Alamat Guru</label>
							<div class="col-sm-9">								
								<textarea class="form-control" name="alamat">{{$data['profil']->alamat}}</textarea>
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

@section('js')
<script src="{{asset('asset/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
	jQuery('.mydatepicker').datepicker();
</script>
@endsection