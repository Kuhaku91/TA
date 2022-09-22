<div class="modal fade" id="Edit{{$kelas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/kelas/ubah/'.$kelas->id)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>TAHUN</label>
                        <input type="text" name="tahun" class="form-control" placeholder="TAHUN" value="{{$kelas->tahun}}">
                    </div>
                    <div class="form-group">
                        <label>KELAS</label>
                        <input type="text" name="kelas" class="form-control" placeholder="KELAS" value="{{$kelas->kelas}}">
                    </div>
                    <div class="form-group">
                        <label>KETERANGAN</label>
                        <input type="text" name="ket" class="form-control" placeholder="KETERANGAN" value="{{$kelas->ket}}">
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