<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa\profil_siswa;
use App\Models\Wali\profil_wali;
use App\Models\Guru\profil_guru;
use App\Models\BK\profil_bk;
use App\Models\Kelas;
use Hash;

class AkunController extends Controller
{
	public function Akun(){

		$data = [
			'user' => User::where('role','admin')->where('id','!=',Auth()->user()->id)->get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
		// dd($data);
		return view('Admin.Akun.admin',compact('data'));
	}

	public function AkunBk(){

		$data = [
			'user' => User::where('role','bk')->get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
		// dd($data);
		return view('Admin.Akun.bk',compact('data'));
	}

	public function AkunGuru(){

		$data = [
			'user' => User::join('profil_gurus','users.id','profil_gurus.id')->where('role','guru')->get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
		// dd($data);
		return view('Admin.Akun.guru',compact('data'));
	}

	public function AkunSiswa(){

		$data = [
			'user' => User::join('profil_siswas','users.id','profil_siswas.id')->where('role','siswa')->get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
		// dd($data);
		return view('Admin.Akun.siswa',compact('data'));
	}

	public function AkunWali(){
		$data = [
			'user' => User::where('role','wali')->get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
		// dd($data);
		return view('Admin.Akun.wali',compact('data'));
	}

	public function TAkun(Request $r){
		// dd($r);
		if ($r->role=='admin') {
			$d = new User;
			$d->name = $r->name;
			$d->email = $r->email;
			$d->password = Hash::make($r->password);
			$d->role = 'admin';
			$d->save();

			return redirect()->back();
		}
		elseif($r->role=='bk'){
			$d = new User;
			$d->name = $r->name;
			$d->email = $r->email;
			$d->password = Hash::make($r->password);
			$d->role = 'bk';
			$d->save();
			$id_bk = $d->id;

			$p_bk = new profil_bk;
			$p_bk->id = $id_bk;
			$p_bk->save();

			return redirect()->back();
		}
		elseif($r->role=='guru'){
			$d = new User;
			$d->name = $r->name;
			$d->email = $r->email;
			$d->password = Hash::make($r->password);
			$d->role = 'guru';
			$d->save();
			$id_guru = $d->id;

			$p_guru = new profil_guru;
			$p_guru->id = $id_guru;
			$p_guru->jenis_kelamin = $r->jenis_kelamin;
			$p_guru->ttl = $r->tempat.','.$r->tgl;
			$p_guru->alamat = $r->alamat;
			$p_guru->latar = $r->latar;
			$p_guru->no_hp = $r->no_hp;
			$p_guru->save();

			return redirect()->back();
		}
		elseif($r->role=='siswa'){
			// dd($r);
			$d = new User;
			$d->name = $r->namesiswa;
			$d->email = $r->emailsiswa;
			$d->password = Hash::make($r->passwordsiswa);
			$d->role = 'siswa';
			$d->save();
			$id_siswa=$d->id;

			$p_siswa = new profil_siswa;
			$p_siswa->id = $id_siswa;
			$p_siswa->kelas_id = $r->kelas_id;
			$p_siswa->alamat = $r->alamat;

			$p_siswa->nisn = $r->nisn;
			$p_siswa->jenis_kelamin = $r->jenis_kelamin;
			$p_siswa->ttl = $r->tempat.','.$r->tgl;
			$p_siswa->no_hp = $r->no_hp;
			$p_siswa->lulusan = $r->lulusan;
			$p_siswa->agama = $r->agama;
			$p_siswa->ayah = $r->ayah;
			$p_siswa->ibu = $r->ibu;

			$p_siswa->save();

			return redirect()->back();
		}
		elseif($r->role=='wali'){
			$d = new User;
			$d->name = $r->namewali;
			$d->email = $r->emailwali;
			$d->password = Hash::make($r->passwordwali);
			$d->role = 'wali';
			$d->save();
			$id_wali=$d->id;

			$p_siswa = new profil_wali;
			$p_siswa->id = $id_wali;
			$p_siswa->alamat = $r->alamatwali;
			$p_siswa->save();

			profil_siswa::where('id',$r->namesiswa)->update([
				'wali' => $id_wali,
			]);

			return redirect()->back();
		}
	}

	public function UAkun(Request $r,$id){
		// dd($r,$id);
		if ($r->role=='siswa') {
			$this->siswa($r,$id);
		}
		if ($r->role=='guru'){
			$this->guru($r,$id);
		}
		if ($r->password!=null) {
			User::where('id',$id)->update([
				'name' => $r->name,
				'email'	=> $r->email,
				'password' => Hash::make($r->password),
			]);
		}
		else{
			User::where('id',$id)->update([
				'name' => $r->name,
				'email'	=> $r->email,
			]);
		}

		return redirect()->back();
	}

	public function HAkun($id){
		$d = User::find($id);
		$d->delete();
		return redirect()->back();
	}

	public function siswa($r,$b){
		// dd($a);

		$p_siswa = profil_siswa::find($b);

		$p_siswa->alamat = $r->alamat;

		$p_siswa->nisn = $r->nisn;
		$p_siswa->jenis_kelamin = $r->jenis_kelamin;
		$p_siswa->ttl = $r->tempat.','.$r->tgl;
		$p_siswa->no_hp = $r->no_hp;
		$p_siswa->lulusan = $r->lulusan;
		$p_siswa->agama = $r->agama;
		$p_siswa->ayah = $r->ayah;
		$p_siswa->ibu = $r->ibu;

		$p_siswa->update();
	}

	public function guru($r,$b)
	{
		$p_guru = profil_guru::find($b);

		$p_guru->jenis_kelamin = $r->jenis_kelamin;
		$p_guru->ttl = $r->tempat.','.$r->tgl;
		$p_guru->alamat = $r->alamat;
		$p_guru->latar = $r->latar;
		$p_guru->no_hp = $r->no_hp;

		$p_guru->update();
	}
}
