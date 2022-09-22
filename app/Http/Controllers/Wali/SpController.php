<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataSp;
use App\Models\RekapSp;
use App\Models\Siswa\profil_siswa;

class SpController extends Controller
{
	public function WALISP(){
		$id = profil_siswa::where('wali',Auth()->user()->id)->first()->id;
		// dd($id);
		$data = [
			'dsp' => RekapSp::where('id_user',$id)->get(),
		];
		// dd($data);
		return view('Wali.Sp.dsp',compact('data'));
	}

	public function PWALISP(Request $r)
	{
		// dd($r);
		$ex = explode(' ', $r->data);
		$a = RekapSp::where('id_user',$ex[0])->where('status_sp',$ex[1])->first();
		$x = date('Y-m-d H:i',strtotime('+7 hours',strtotime($a->updated_at)));
		$b = explode(' ',$x);
		$c = explode('-', $b[0]);
		$d = explode(':', $b[1]);
		$z = date($c[0].'-'.$c[2].'-'.$c[1].' '.$d[0].':'.$d[1]);

		$e = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
		);
		$f = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'Oktober',
			'10' => 'November',
			'11' => 'September',
			'12' => 'Desember',
		);
		$g = date('Y-m-d H:i',strtotime($z));
		$data = [
			'user' => User::find(Auth()->user()->id),
			'datasp' => RekapSp::where('id_user',$ex[0])->where('status_sp',$ex[1])->first(),
			'hari' => $e[date('D',strtotime($c[0].'-'.$c[2].'-'.$c[1]))],
			'tanggal' => $c[2].' '.$f[$c[1]].' '.$c[0],
			'jam' => $d[0].' :'.$d[1],
		];
    	// dd($data);
		if ($data['datasp']->status_sp=='sp3') {
			return view('Cetak.surat_peringatan_tiga',compact('data'));
		}
		else{
			return view('Cetak.surat_peringatan_satu',compact('data'));
		}
	}

	public function WALISPa()
	{
		$id = profil_siswa::where('wali',Auth()->user()->id)->first();
		$a = DataSp::where('id_user',$id->id)->first();
		//merubah format dan menmabah jam
		$x = date('Y-m-d H:i',strtotime('+7 hours',strtotime($a->updated_at)));
		$b = explode(' ',$x);
		$c = explode('-', $b[0]);
		$d = explode(':', $b[1]);
		$z = date($c[0].'-'.$c[2].'-'.$c[1].' '.$d[0].':'.$d[1]);
		// dd($x,$z);
		$e = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
		);
		$f = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'Oktober',
			'10' => 'November',
			'11' => 'September',
			'12' => 'Desember',
		);
		$g = date('Y-m-d H:i',strtotime($z));
		$data = [
			'user' => User::find(Auth()->user()->id),
			'datasp' => DataSp::where('id_user',$id->id)->first(),
			'hari' => $e[date('D',strtotime($c[0].'-'.$c[2].'-'.$c[1]))],
			'tanggal' => $c[2].' '.$f[$c[1]].' '.$c[0],
			'jam' => $d[0].' :'.$d[1],
		];
    	// dd($data);
		if ($data['datasp']->status_sp=='sp3') {
			return view('Cetak.surat_peringatan_tiga',compact('data'));
		}
		else{
			return view('Cetak.surat_peringatan_satu',compact('data'));
		}
	}
}
