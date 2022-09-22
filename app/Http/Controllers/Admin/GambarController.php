<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableGambar;
use File;

class GambarController extends Controller
{
	public function Gambar()
	{
		$data = [
			'gambar' => TableGambar::all(),
		];

    	// dd($data);
		return view('Admin.Gambar.Gambar',compact('data'));
	}

	public function TGambar(Request $r)
	{	
		// dd($r);
		$filettd = '';
		$extttd = '';
		$filenamettd = '';
		$filenamelogo = '';
		if ($r->file('ttd')!=null) {
			
				//upload gambar
			$filettd = $r->file('ttd');
			$extttd = $filettd->getClientOriginalExtension();
			$filenamettd = 'ttd'.'.'.$extttd;
			$this->inp($r,'ttd',$filenamettd,$filettd);
		// $filettd->move('GAMBAR/',$filenamettd);
		}
		else if ($r->file('logo')!=null) {
			
			$filelogo = $r->file('logo');
			$extlogo = $filelogo->getClientOriginalExtension();
			$filenamelogo = 'logo'.'.'.$extlogo;
			$this->inp($r,'logo',$filenamelogo,$filelogo);
		// $filelogo->move('GAMBAR/',$filenamelogo);
		}
		else{
			return redirect()->back();
		}

		return redirect()->route('AdminGambar');
	}

	public function inp($r,$y,$z,$x)
	{
		// dd($r,$y,$z,$x);
		$data = TableGambar::where($y,$z)->first();
		// dd($filenamettd,$data);
		// dd($data,$y,$z);
		if ($data==null) {
			$a = TableGambar::where($y,'')->first();
			// dd($a,$y);
			if ($y=='logo') {
				TableGambar::where($y,'')->update([
					'logo' => $z
				]);
				// dd('ok');
				$this->hgambr($z,$x);
			}
			if ($y=='ttd') {
				TableGambar::where($y,'')->update([
					'ttd' => $z
				]);
				// dd('ok');
				$this->hgambr($z,$x);
			}
			// dd('up');
		}
		else{
			// dd('ada');
			$this->hgambr($z,$x);
			// dd('ada');
		}
		// dd($data);
		// dd($r);
	}

	public function hgambr($a,$b)
	{
		if (File::delete('GAMBAR/',$a)) {
			$b->move('GAMBAR/',$a);
		}
		else{
			$b->move('GAMBAR/',$a);
		}
	}
}
