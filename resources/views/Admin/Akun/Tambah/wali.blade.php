<div class="modal fade" id="WaliSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/akun')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun Siswa dan Wali</h5>
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
                    <div class="form-group" id="name">
                        <label>Nama Siswa</label>
                        <select name="namesiswa" id="namesiswa" class="form-control">
                            <option value="">Pilih Nama Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Wali</label>
                        <input type="text" name="namewali" class="form-control" placeholder="Nama Wali">
                    </div>
                    <div class="form-group">
                        <label>Password Wali</label>
                        <input type="text" name="passwordwali" class="form-control" placeholder="Password Wali">
                    </div>
                    <div class="form-group">
                        <label>E-Mail Wali</label>
                        <input type="text" name="emailwali" class="form-control" placeholder="E-Mail Wali">
                    </div>
                    <div class="form-group">
                        <label>Alamat Wali</label>
                        <input type="text" name="alamatwali" class="form-control" placeholder="E-Mail Wali">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="role" value="wali" class="btn btn-success margin-5">
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