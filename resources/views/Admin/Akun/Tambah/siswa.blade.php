<div class="modal fade" id="WaliSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/akun')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                @if(count($data['kelas']))
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="">Pilih Jurusan</option>
                            @foreach($data['kelas'] as $kelas)
                            <option value="{{$kelas->ket}}">{{$kelas->ket}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="kelas">
                        <label>Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option value="">Pilih Kelas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NISN Siswa</label>
                        <input type="text" name="nisn" class="form-control" placeholder="NISN Siswa">
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="namesiswa" class="form-control" placeholder="Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Siswa</label>
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
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat Siswa">
                    </div>
                    <div class="form-group">
                        <label>No. Hp</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" name="lulusan" class="form-control" placeholder="Asal Sekolah">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="Agama">
                    </div>
                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="ayah" class="form-control" placeholder="Ayah">
                    </div>
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="ibu" class="form-control" placeholder="Ibu">
                    </div>
                    <div class="form-group">
                        <label>Password Siswa</label>
                        <input type="text" name="passwordsiswa" class="form-control" placeholder="Password Siswa">
                    </div>
                    <div class="form-group">
                        <label>E-Mail Siswa</label>
                        <input type="text" name="emailsiswa" class="form-control" placeholder="E-Mail Siswa">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="role" value="siswa" class="btn btn-success margin-5">
                        Simpan Data
                    </button>
                </div>
                @else
                <div class="modal-body">
                    <div class="form-group">
                        Anda Harus Menambahkan Data Kelas Terlebih Dahulu -> <a href="{{url('admin/kelas')}}">KELAS</a>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>