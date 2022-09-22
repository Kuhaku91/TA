<div class="modal fade" id="Guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/akun')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun Guru</h5>
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
                        <label>Jenis Kelamin</label>
                        <select class="select2 form-control" name="jenis_kelamin" style="width: 100%; height:36px;">
                            <option>Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <input type="text" class="form-control mydatepicker" id="tgl" name="tgl" placeholder="Tanggal Lahir">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat Guru">
                    </div>
                    <div class="form-group">
                        <label>Latar Belakang</label>
                        <textarea name="latar" class="form-control" placeholder="Latar Belakang Guru"></textarea>
                    </div>
                    <div class="form-group">
                        <label>No. Hp</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp">
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
                    <button type="submit" name="role" value="guru" class="btn btn-success margin-5">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>