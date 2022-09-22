<div class="modal fade" id="Edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <form action="{{url('admin/akun/ubah/'.$user->id)}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($user->role=='siswa')
                    <div class="form-group row">
                        <label class="col-md-3">NISN Siswa</label>
                        <input type="text" name="nisn" class="form-control col-md-9" placeholder="NISN Siswa" value="{{$user->nisn}}">
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="select2 form-control" name="jenis_kelamin" style="width: 100%; height:36px;">
                            <option>Pilih</option>
                            <option value="Laki-Laki" <?= $user->jenis_kelamin=='Laki-Laki' ? 'selected' : '' ?> >Laki-Laki</option>
                            <option value="Perempuan" <?= $user->jenis_kelamin=='Perempuan' ? 'selected' : '' ?> >Perempuan</option>
                        </select>
                    </div>
                    <?php
                    $a='';
                    $b='';
                    if ($user->ttl) {
                        $c=explode(',',$user->ttl);
                        $a=$c[0];
                        $b=$c[1];
                    }
                    else{
                        $a='';
                        $b=DATE('Y/m/d');
                    }
                    ?>
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" value="{{$a}}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <input type="text" class="form-control mydatepicker" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="{{$b}}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$user->alamat}}">
                    </div>
                    @if($user->role=='guru')
                    <div class="form-group">
                        <label>Latar Belakang</label>
                        <textarea name="latar" class="form-control" placeholder="Latar Belakang">{{$user->latar}}</textarea>
                    </div>
                    @endif
                    @if($user->role=='siswa')
                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" name="lulusan" class="form-control" placeholder="Asal Sekolah" value="{{$user->lulusan}}">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{$user->agama}}">
                    </div>
                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="ayah" class="form-control" placeholder="Ayah" value="{{$user->ayah}}">
                    </div>
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="ibu" class="form-control" placeholder="Ibu" value="{{$user->ibu}}">
                    </div>
                    @endif
                    <div class="form-group">
                        <label>No. Hp</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp" value="{{$user->no_hp}}">
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" name="email" class="form-control" placeholder="E-Mail" value="{{$user->email}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>