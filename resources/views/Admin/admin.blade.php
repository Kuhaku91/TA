@extends('Layout.layout')

@section('title','ADMIN')

@section('css')

@endsection

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<form class="form-horizontal" action="{{url('admin')}}" method="post">
					<div class="card-body">
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">UBAH DATA AKUN</h5>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="name" class="form-control" placeholder="Nama" value="{{$data->name}}">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<label>E-Mail</label>
								<input type="text" name="email" class="form-control" placeholder="E-Mail" value="{{$data->email}}">
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" name="role" value="admin" class="btn btn-success margin-5">
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