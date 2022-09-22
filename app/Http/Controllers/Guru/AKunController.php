<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru\profil_guru;
use Hash;

class AKunController extends Controller
{
	public function UGuru(Request $r){
		// dd($r);
		$id = Auth()->user()->id;
		if ($r->data=='user') {
			if ($r->password==null) {
				$u = User::find($id);
				$u->name = $r->name;
				$u->email = $r->email;
				$u->save();
			}
			elseif($r->password!=null){
				$u = User::find($id);
				$u->name = $r->name;
				$u->email = $r->email;
				$u->password = Hash::make($r->password);
				$u->save();
			}
		}
		elseif ($r->data=='profil') {
			$p = profil_guru::find($id);
			$p->ttl = $r->tmp.','.$r->tgl;
			$p->no_hp = $r->no_hp;
			$p->alamat = $r->alamat;
			$p->save();
		}

		return redirect('guru');
	}
}
