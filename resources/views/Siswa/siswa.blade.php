@extends('Layout.layout')

@section('title','SISWA')

@section('css')

@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">PROFIL</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('Siswa')}}">Siswa</a></li>
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
				<form class="form-horizontal" action="{{url('siswa/ubah/'.Auth()->user()->id)}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Siswa</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Siswa" value="{{$data['user']->name}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-3 text-right control-label col-form-label">E-Mail Siswa</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail Siswa" value="{{$data['user']->email}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 text-right control-label col-form-label">Password Siswa</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="password" name="password">
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
				<form class="form-horizontal" action="{{url('siswa/ubah/'.Auth()->user()->id)}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group row">
							<label for="kelas" class="col-sm-3 text-right control-label col-form-label">Kelas Siswa</label>
							<?php
							$a = explode(" ",$data['profil']->kelas);
							$b = DATE('Y')-$data['profil']->tahun+10;
							if ($b==10) {
								$b="X";
							}
							if ($b==11) {
								$b="XI";
							}
							if ($b==12) {
								$b="XII";
							}
							?>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas Siswa" value="{{$b}} {{$a[1]}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="jurusan" class="col-sm-3 text-right control-label col-form-label">Jurusan Siswa</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan Siswa" value="{{$data['profil']->ket}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="no_hp" class="col-sm-3 text-right control-label col-form-label">No Hp Siswa</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Hp" value="{{$data['profil']->no_hp}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="jenis_kelamin" class="col-sm-3 text-right control-label col-form-label">Jenis Kelamin Siswa</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="jenis_kelamin" name="jenis_kelamin" style="width: 100%; height:36px;">
									<option>Pilih</option>
									<option <?= $data['profil']->jenis_kelamin=='Laki-Laki'? 'selected' : '' ?>>Laki-Laki</option>
									<option <?= $data['profil']->jenis_kelamin=='Perempuan'? 'selected' : '' ?>>Perempuan</option>
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

@section('js')


@endsection