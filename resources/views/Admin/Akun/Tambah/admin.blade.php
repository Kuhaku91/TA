<div class="modal fade" id="Admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/akun')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" name="email" class="form-control" placeholder="E-Mail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="role" value="admin" class="btn btn-success margin-5">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>