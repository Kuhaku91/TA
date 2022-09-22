@extends('Layout.layout')

@section('title','BK')

@section('css')
<link href="{{asset('asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('posisi')
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h4 class="page-title">Chat Laporan</h4>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('BkPoint')}}">Melaporkan</a></li>
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
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Chat Laporan Guru</h4>
					<div class="chat-box scrollable" style="height:475px;">
						<!--chat Row -->
						<ul class="chat-list">
							@foreach($data[0]['chat_point'] as $chat)
							@if($chat->id_pengirim==0)
							<!--chat Row -->
							<li class="odd chat-item">
								<div class="chat-content">
									<div class="box bg-light-inverse">{{$chat->chat}}</div>
									<br>
								</div>
								<div class="chat-time">10:59 am</div>
							</li>
							@elseif($chat->id_pengirim!=0)
							<!--chat Row -->
							<li class="chat-item">
								<div class="chat-img"><img src="{{asset('asset/assets/images/users/1.jpg')}}" alt="user"></div>
								<div class="chat-content">
									<h6 class="font-medium">{{$chat->nama($chat->id_pengirim)}}</h6>
									<div class="box bg-light-info">{{$chat->chat}}</div>
								</div>
								<div class="chat-time">10:56 am</div>
							</li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
				<div class="card-body border-top">
					<form class="row" action="{{url('bk/lapor/siswa',$data['id'])}}" method="post">
						@csrf
						<div class="col-9">
							<div class="input-field m-t-0 m-b-0">
								<textarea id="textarea1" name="chat" placeholder="Tulis Pesan" class="form-control border-0"></textarea>
							</div>
						</div>
						<div class="col-3">
							<button class="btn-circle btn-lg btn-cyan float-right text-white" name="id_penerima" value="{{$data['id_penerima']->id_dilapor}}">
								<i class="fas fa-paper-plane"></i>
							</button>
						</div>
					</form>
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