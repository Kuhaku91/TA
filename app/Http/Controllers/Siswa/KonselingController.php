<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konseling;
use App\Models\ChatKonseling;

class KonselingController extends Controller
{
    public function Konseling(){
    	$data = [
    		'guru' => User::join('profil_bks','users.id','profil_bks.id')->get(),
    		'konseling' => Konseling::
            addselect('konselings.id')->
            addselect('users.name')->
            addselect('konselings.jenis_konseling')->
            addselect('konselings.ket')->
            addselect('konselings.created_at')->
            addselect('konselings.verif')->
            leftjoin('users','konselings.id_guru','users.id')->
            where('id_siswa',Auth()->user()->id)->
            get(),
    	];
    	// dd($data);
    	return view('Siswa.Konseling.konseling',compact('data'));
    }

    public function TKonseling(Request $r){
    	// dd($r);
    	$d = new Konseling;
    	$d->id_siswa = Auth()->user()->id;
    	$d->id_guru = $r->id_guru;
    	$d->jenis_konseling = $r->jenis_konseling;
    	$d->ket = $r->ket;
    	$d->save();
    	return redirect('siswa/konseling');
    }

    public function CKonseling($id){
        $data = [
            'chat' => ChatKonseling::where('id_konseling',$id)->get(),
            'id' => $id,
            'id_penerima' => Konseling::find($id),
        ];
        // dd($data);
        return view('Siswa.Konseling.ckonseling',compact('data'));
    }

    public function TCKonseling(Request $r,$id){
        // dd($r,$id);
        $a = new ChatKonseling;
        $a->id_konseling = $id;
        $a->id_pengirim = Auth()->user()->id;
        $a->id_penerima = $r->id_penerima;
        $a->chat = $r->chat;
        $a->save();
        
        return redirect()->back();
    }
}
