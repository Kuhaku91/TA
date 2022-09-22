@extends('Layout.layout')

@section('title','ADMIN')

@section('css')

@endsection

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<form class="form-horizontal" action="{{url('admin/gambar')}}" method="post" enctype="multipart/form-data">
					<div class="card-body">
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">UBAH DATA GAMBAR</h5>
						</div>
						<div class="modal-body">
							<div class="form-group row">
								<label for="ttd" >TTD</label>
								<div class="col-md-12">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="ttd" name="ttd" >
										<label class="custom-file-label" for="ttd">Choose file...</label>
										<div class="invalid-feedback">Example invalid custom file feedback</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="logo" >LOGO</label>
								<div class="col-md-12">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="logo" name="logo" >
										<label class="custom-file-label" for="logo">Choose file...</label>
										<div class="invalid-feedback">Example invalid custom file feedback</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success margin-5">
								Simpan Data
							</button>
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