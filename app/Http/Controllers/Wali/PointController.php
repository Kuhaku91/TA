<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lapor;
use App\Models\Siswa\profil_siswa;
use App\Models\ChatWali;

class PointController extends Controller
{
    public function DPoint(){
    	$id = profil_siswa::where('wali',Auth()->user()->id)->first();
    	// dd($id);
        $tpoint = Lapor::addselect('points.beban')->
        leftjoin('points','lapors.id_point','points.id')->
        where('id_dilapor',$id->id)->
        where('verif','s')->
        get();
        // dd($tpoint);
        $total_point = 0;
        foreach ($tpoint as $tpoint) {
            $total_point +=$tpoint->beban;
        }
        
        $data = [
            'lapor' => Lapor::
            addselect('lapors.id')->
            addselect('points.beban')->
            addselect('points.ket as ur')->
            addselect('lapors.ket')->
            addselect('lapors.bukti')->
            addselect('lapors.created_at as tgl')->
            rightjoin('points','lapors.id_point','points.id')->
            where('id_dilapor',$id->id)->where('verif','s')->get(),
            'total_point' => $total_point,
        ];

        // dd($data);
        return view('Wali.Point.dpoint',compact('data'));
    }

    public function CDPoint($id){
        $data = [
            'chat' => ChatWali::where('id_point',$id)->get(),
            'id' => $id,
            'id_penerima' => Lapor::find($id),
        ];
        // dd($data);
        return view('Wali.Point.cpoint',compact('data'));
    }

    public function TCDPoint(Request $r,$id){
        // dd($r,$id);
        $a = new ChatWali;
        $a->id_point = $id;
        $a->id_pengirim = Auth()->user()->id;
        $a->id_penerima = '0';
        $a->chat = $r->chat;
        $a->save();
        
        return redirect('wali/point/'.$id);
    }
}
