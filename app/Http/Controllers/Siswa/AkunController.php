<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa\profil_siswa;
use Hash;

class AkunController extends Controller
{
    public function UAkun(Request $r,$id){
    	if ($r->data=='user') {
    		$u = User::find($id);
    		$u->name = $r->name;
    		$u->email = $r->email;
    		$u->password = Hash::make($r->password);
    		$u->save();
    	}
    	elseif ($r->data=='profil') {
    		$p = profil_siswa::find($id);
    		$p->no_hp = $r->no_hp;
    		$p->jenis_kelamin = $r->jenis_kelamin;
    		$p->save();
    	}

    	return redirect('/siswa');
    }
}
