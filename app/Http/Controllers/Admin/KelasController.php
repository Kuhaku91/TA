<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function Kelas()
    {
		$data = [
			'kelas' => Kelas::all(),
		];
		return view('Admin.Kelas.kelas',compact('data'));
    }

    public function TKelas(Request $r){
		$r->validate([
			'tahun' => 'required|integer',
			'kelas'	=> 'required|string',
			'ket'	=> 'required|string',
		]);
		// dd('ok',$r);
		$d = new Kelas;
		$d->tahun = $r->tahun;
		$d->kelas = $r->kelas;
		$d->ket = $r->ket;
		$d->save();

		return redirect('admin/kelas');
	}

	public function UKelas(Request $r,$id){
		$d = Kelas::find($id);
		$d->tahun = $r->tahun;
		$d->kelas = $r->kelas;
		$d->ket = $r->ket;
		$d->save();

		return redirect('admin/kelas');
	}

	public function HKelas($id){
		$d = Kelas::find($id);
		$d->delete();
		
		return redirect('admin/kelas');
	}
}
