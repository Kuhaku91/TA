<div class="modal fade" id="Detail{{$lapor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gambar Bukti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($lapor->bukti!='kosong')
                <img src="{{asset('BUKTI/'.$lapor->bukti)}}" alt="{{$lapor->bukti}}" width="100% ">
                <br>
                <br>
                @endif
                @if($lapor->bukti1!='kosong')
                <img src="{{asset('BUKTI1/'.$lapor->bukti1)}}" alt="{{$lapor->bukti1}}" width="100% ">
                <br>
                <br>
                @endif
                @if($lapor->bukti2!='kosong')
                <img src="{{asset('BUKTI2/'.$lapor->bukti2)}}" alt="{{$lapor->bukti2}}" width="100% ">
                <br>
                <br>
                @endif
                @if($lapor->bukti3!='kosong')
                <img src="{{asset('BUKTI3/'.$lapor->bukti3)}}" alt="{{$lapor->bukti3}}" width="100% ">
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>