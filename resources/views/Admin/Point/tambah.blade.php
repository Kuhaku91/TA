<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/point')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Beban Point</label>
                        <input type="text" name="beban" class="form-control" placeholder="Beban Point">
                    </div>
                    <div class="form-group">
                        <label>Uraian Kesalahan</label>
                        <textarea name="ket" class="form-control" placeholder="Uraian Kesalahan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success margin-5">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>