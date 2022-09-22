<?php

namespace App\Http\Controllers\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bk\profil_bk;
use Hash;

class AkunController extends Controller
{
    public function TBk(Request $r){
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
            $p = profil_bk::find($id);
            $p->jenis_kelamin = $r->jenis_kelamin;
            $p->ttl = $r->tmp.','.$r->tgl;
            $p->no_hp = $r->no_hp;
            $p->alamat = $r->alamat;
            $p->kelas_id = $r->kelas;
            $p->save();
        }

        return redirect('bk');
    }
}
