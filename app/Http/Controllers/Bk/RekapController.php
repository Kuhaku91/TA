<?php

namespace App\Http\Controllers\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Lapor;
use DB;

class RekapController extends Controller
{
	public function Rekap(Request $request)
	{
		$data = [
			'point' => User::join('profil_siswas','users.id','profil_siswas.id')->get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
    	// dd($data['point']);
    	// dd($data);
		return view('Bk.Rekap.rekap',compact('data'));
	}

	public function DRekap($id)
	{	
		$data = [
			'point' => Lapor::
			select('lapors.ket','points.beban','points.ket as pket','lapors.created_at','lapors.updated_at')->
			leftjoin('points','lapors.id_point','points.id')->
			where('id_dilapor',$id)->
			where('verif','s')->
			get(),
			'siswa' => User::join('profil_siswas','users.id','profil_siswas.id')->first(),
		];
		// dd($data);
		return view('Bk.Rekap.drekap',compact('data'));
	}

	public function cRekap($id)
	{	
		$z = explode('-',Date('Y-m-d',strtotime(request()->tgl)));
		$y = explode('-',Date('Y-m-d',strtotime(request()->tgl1)));
		$x = Date('Y-m-d',strtotime(request()->tgl)).' 00:00:00';
		$w = Date('Y-m-d',strtotime(request()->tgl1)).' 23:59:59';
		// dd(request()->tgl,$id);
		$data = [
			'point' => DB::select('SELECT b.name,SUM(c.beban) AS beban FROM lapors AS a
				LEFT JOIN users AS b ON a.id_dilapor=b.id
				LEFT JOIN points AS c ON a.id_point=c.id
				LEFT JOIN profil_siswas d ON b.id=d.id
				WHERE d.kelas_id='.$id.' AND
				YEAR(a.created_at)='.$z[0].' AND
				MONTH(a.created_at)='.$z[1].'
				GROUP BY a.id_dilapor'),
			'kelas'	=> Kelas::find($id),
			// 'rekap' => $this->rek($z[0],$z[1]),
			'rekap' => $x.' Hingga '.$w,
			'tgl' => $this->tgl(),
			'th' => $this->th(Kelas::find($id)->tahun,Kelas::find($id)->kelas),
			
			'data' => DB::table('lapors as a')->
			select('b.name', 'd.kelas_id', 'a.ket AS ket', 'c.beban', 'c.ket AS pket', 'a.created_at')->
			leftjoin('users as b','a.id_dilapor','b.id')->
			leftjoin('points as c','a.id_point','c.id')->
			leftjoin('profil_siswas as d','b.id','d.id')->
			where('b.role','siswa')->
			where('d.kelas_id',$id)->
			wherebetween('a.created_at',[$x,$w])->
			orderby('a.created_at','desc')->
			get(),

		];

		// dd($data,$z[0],$z[1]);
		return view('Bk.Rekap.rekap_point',compact('data'));
	}

	public function rek($a,$b)
	{
		$ar = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];

		return $ar[$b].' Tahun '.$a;
	}

	public function tgl()
	{	
		$a = Date('Y-m-d H:i:s',time()+60*60*7);
		$b = explode(' ',$a);
		$c = explode('-',$b[0]);
		$ar = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		$data = $c[2].' '.$ar[$c[1]].' '.$c[0];
		return $data;
	}

	public function th($z,$y)
	{
		$a = Date('Y-m-d H:i:s',time()+60*60*7);
		$b = explode(' ',$a);
		$c = explode('-',$b[0]);
		$d = explode(' ', $y);
		$data = '';
		if ($z-$c[0]=='0') {
			$data = 'X';
		}
		elseif ($z-$c[0]=='1') {
			$data = 'XI';
		}
		elseif ($z-$c[0]=='2') {
			$data = 'XII';
		}

		$data = $data.' '.$d[1];
		return $data;
	}

	public function Data()
	{
		$data = [
			'user' => User::
			join('profil_siswas','users.id','profil_siswas.id')->
			leftjoin('kelas','profil_siswas.kelas_id','kelas.id')->
			where('role','siswa')->
			get(),
			'kelas' => Kelas::groupBy('ket')->get(),
		];
		// dd($data,$data['user']);
		return view('Bk.Akun.siswa',compact('data'));
	}

	public function Get_Data()
	{	
		$data = [];

		$jur = '';
		if (request()->jurusan) {
			$jur=request()->jurusan;
		}
		if ($jur=='Pilih Jurusan') {
			$jur='';
		}

		$a = User::
		select(
			'users.id as id',
			'name',
			'email',
			'nisn',
			'no_hp',
			'jenis_kelamin',
			'ttl',
			'alamat',
			'lulusan',
			'agama',
			'ayah',
			'ibu',
			'tahun',
			'kelas',
			'ket',
			'kelas_id',
		)->
		join('profil_siswas','users.id','profil_siswas.id')->
		leftjoin('kelas','profil_siswas.kelas_id','kelas.id')->
		where('role','siswa')->
		where('ket','LIKE','%'.$jur.'%')->
		get();

		// dd($a,$jur);

		foreach ($a as $a) {
			$data[] = array(
				'name' => $a->name,
				'email' => $a->email,
				'kelas' => $a->nama_kelas($a->kelas_id),
				'id' => $a->id,
			);
		}

		return response()->json(compact('data'));
	}
}
