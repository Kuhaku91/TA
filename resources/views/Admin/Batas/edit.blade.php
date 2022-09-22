<div class="modal fade" id="Edit{{$batas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/batas/ubah/'.$batas->id)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Batas Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>BATAS SP</label>
                        <input type="text" name="batas" class="form-control" placeholder="BATAS POINT" value="{{$batas->batas}}">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>KETERANGAN SP</label>
                        <input type="text" name="ket" class="form-control" placeholder="{{$batas->ket}}" value="{{$batas->ket}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success margin-5">
                        Edit Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>