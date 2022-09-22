<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\DataSp;
use App\Models\RekapSp;
use App\Models\lapor;
use App\Models\TableGambar;

class SpController extends Controller
{
	public function GURUSP()
	{
		$data = [
			'dsp' => RekapSp::where('id_user',Auth()->user()->id)->get(),
		];
		// dd($data);
		return view('Guru.Sp.dsp',compact('data'));
	}

	public function PGURUSP(Request $r)
	{
		// dd($r);
		$ex = explode(' ', $r->data);
		$a = RekapSp::where('id_user',$ex[0])->where('status_sp',$ex[1])->first();
		$x = date('Y-m-d H:i',strtotime('+7 hours',strtotime($a->updated_at)));
		$b = explode(' ',$x);
		$c = explode('-', $b[0]);

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
    	$data = [
			'user' => User::find(Auth()->user()->id),
			'datasp' => RekapSp::where('id_user',$ex[0])->where('status_sp',$ex[1])->first(),
			'tanggal' => $c[2].' '.$f[$c[1]].' '.$c[0],
			'lapor'	=> lapor::addSelect('points.*')->addSelect('lapors.*')->addSelect('lapors.ket as lket')->addSelect('points.ket as pket')->leftjoin('points','lapors.id_point','points.id')->where('id_dilapor',Auth()->user()->id)->where('verif','s')->get(),
    		'gambar' => TableGambar::addSelect('logo','ttd')->first(),
    	];
    	// dd($data);
    	// dd($data['gambar']->logo);
    	return view('Cetak.surat_peringatan_guru',compact('data'));
	}

    public function GURUSPa()
    {
    	$a = DataSp::where('id_user',Auth()->user()->id)->first();
		//merubah format dan menmabah jam
		$x = date('Y-m-d H:i',strtotime('+7 hours',strtotime($a->updated_at)));
		$b = explode(' ',$x);
		$c = explode('-', $b[0]);

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
    	$data = [
			'user' => User::find(Auth()->user()->id),
			'datasp' => DataSp::where('id_user',Auth()->user()->id)->first(),
			'tanggal' => $c[2].' '.$f[$c[1]].' '.$c[0],
			'lapor'	=> lapor::addSelect('points.*')->addSelect('lapors.*')->addSelect('lapors.ket as lket')->addSelect('points.ket as pket')->leftjoin('points','lapors.id_point','points.id')->where('id_dilapor',Auth()->user()->id)->where('verif','s')->get(),
    		'gambar' => TableGambar::addSelect('logo','ttd')->first(),
    	];
    	// dd($data['gambar']->logo);
    	return view('Cetak.surat_peringatan_guru',compact('data'));
    }
}
