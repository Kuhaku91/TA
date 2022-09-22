<div class="modal fade" id="Hapus{{$point->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/point/hapus/'.$point->id)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger margin-5">
                        Hapus Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>