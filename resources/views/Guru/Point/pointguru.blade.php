@extends('Layout.layout')

@section('title','GURU')

@section('css')

@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">LAPOR</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('GuruPointGuru')}}">Point</a></li>
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
			@if(session('gagal'))
			<div class="alert alert-danger" role="alert">
				{{session('gagal')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true ">&times;</span>
				</button>
			</div>
			@endif
			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true ">&times;</span>
				</button>
			</div>
			@endif
			<!-- <div class="col-md-3 col-sm-12">
				<button type="button" class="btn btn-lg btn-block btn-outline-success" id="ts-success">Success</button>
			</div> -->
		</div>
		<div class="col-md-12">
			<div class="card">
				<form class="form-horizontal" action="{{url('guru/lapor/')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<h4 class="card-title">Melaporkan Guru</h4>
						<div class="form-group row">
							<label for="id_dilapor" class="col-sm-3 text-right control-label col-form-label">Melaporkan Guru</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="id_dilapor" name="id_dilapor" style="width: 100%; height:36px;">
									<option>Pilih nama guru yang dilaporkan</option>
									@foreach($data['guru'] as $guru)
									<option value="{{$guru->id}}">{{$guru->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="id_point" class="col-sm-3 text-right control-label col-form-label">Kesalahan Guru</label>
							<div class="col-sm-9">
								<select class="select2 form-control custom-select" id="id_point" name="id_point" style="width: 100%; height:36px;">
									<option>Kesalahan yang Dilakukan</option>
									@foreach($data['point'] as $point)
									<option value="{{$point->id}}">{{$point->beban}} point untuk {{$point->ket}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="ket" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="ket" name="ket" placeholder="Keterangan Kesalahan"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="bukti" class="col-sm-3 text-right control-label col-form-label">Bukti</label>
							<div class="col-md-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="bukti" name="bukti">
									<label class="custom-file-label" for="bukti">Choose file...</label>
									<div class="invalid-feedback">Example invalid custom file feedback</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bukti1" class="col-sm-3 text-right control-label col-form-label">Bukti</label>
							<div class="col-md-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="bukti1" name="bukti1">
									<label class="custom-file-label" for="bukti">Choose file...</label>
									<div class="invalid-feedback">Example invalid custom file feedback</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bukti2" class="col-sm-3 text-right control-label col-form-label">Bukti</label>
							<div class="col-md-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="2bukti" name="bukti2">
									<label class="custom-file-label" for="bukti">Choose file...</label>
									<div class="invalid-feedback">Example invalid custom file feedback</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="bukti3" class="col-sm-3 text-right control-label col-form-label">Bukti</label>
							<div class="col-md-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="bukti3" name="bukti3">
									<label class="custom-file-label" for="bukti">Choose file...</label>
									<div class="invalid-feedback">Example invalid custom file feedback</div>
								</div>
							</div>
						</div>
					</div>
					<div class="border-top">
						<div class="card-body">
							<button type="submit" name="lapor" value="guru" class="btn btn-primary">Laporkan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

<script>
</script>

@endsection