<?php

namespace App\Http\Controllers\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\ChatKonseling;

class KonselingController extends Controller
{
    public function Konseling()
    {
    	$data = [
    		'konseling' => Konseling::
    		select(
                'konselings.id',
                'users.name',
                'konselings.jenis_konseling',
                'konselings.ket',
                'konselings.created_at',
                'konselings.verif',
                'kelas.tahun',
                'kelas.kelas',
                'kelas.ket',
            )->
            leftjoin('users','konselings.id_siswa','users.id')->
            leftjoin('profil_siswas','konselings.id_siswa','profil_siswas.id')->
            leftjoin('kelas','profil_siswas.kelas_id','kelas.id')->
            where('id_guru',Auth()->user()->id)->
            get(),
        ];
        // dd($data);
        return view('Bk.Konseling.konseling',compact('data'));
    }

    public function VKonseling($id)
    {	
    	Konseling::find($id)->update([
    		'verif' => 's',
    	]);
    	return redirect()->back();
    }

    public function TKonseling($id)
    {   
        Konseling::find($id)->delete();
        return redirect()->back();
    }

    public function CKonseling($id){
        $data = [
            'chat' => ChatKonseling::where('id_konseling',$id)->get(),
            'id' => $id,
            'id_penerima' => Konseling::find($id),
        ];
        // dd($data);
        return view('Bk.Konseling.ckonseling',compact('data'));
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
