<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Lapor;
use App\Models\ChatPoint;
use App\Models\ChatLapor;

class PointController extends Controller
{
    public function Point(){
    	$data = [
            'kelas' => Kelas::groupBy('ket')->get(),
            'point'=> Point::get(),
        ];
    	// dd($data);
        return view('Guru.Point.point',compact('data'));
    }

    public function PointGuru(){
        $data = [
            'guru' => User::join('profil_gurus','users.id','profil_gurus.id')->where('users.id','!=',Auth()->user()->id)->get(),
            'point'=> Point::get(),
        ];
        // dd($data);
        return view('Guru.Point.pointguru',compact('data'));
    }

    public function TPoint(Request $r){
        // dd($r);

        if (empty($r->hasFile('bukti'))&&empty($r->hasFile('bukti1'))&&empty($r->hasFile('bukti2'))&&empty($r->hasFile('bukti3'))) {
            return redirect()->back()->with('gagal','harus upload salah satu bukti dulu');
        }
        // else if ($r->hasFile('bukti')||$r->hasFile('bukti1')||$r->hasFile('bukti2')||$r->hasFile('bukti3')){
        //     return 'ok';
        // }

        if (empty($r->id_dilapor)) {
            return redirect()->back()->with('gagal','harus memilih data yang ingin dilaporkan');
        }
        if (empty($r->id_point)) {
            return redirect()->back()->with('gagal','harus memilih point yang dilaporkan');
        }
        if (empty($r->ket)) {
            return redirect()->back()->with('gagal','harus mengisi keterangan');
        }


        $a = new Lapor;
        $a->id_pelapor = Auth()->user()->id;
        $a->id_dilapor = $r->id_dilapor;
        $a->id_point = $r->id_point;
        $a->ket = $r->ket;

        if ($r->hasFile('bukti')) {
            $file = $r->file('bukti');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('BUKTI/',$filename);
            $a->bukti = $filename;
        }
        else{
            $a->bukti = "kosong";
        }
        if ($r->hasFile('bukti1')) {
            $file = $r->file('bukti1');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('BUKTI1/',$filename);
            $a->bukti1 = $filename;
        }
        else{
            $a->bukti1 = "kosong";
        }
        if ($r->hasFile('bukti2')) {
            $file = $r->file('bukti2');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('BUKTI2/',$filename);
            $a->bukti2 = $filename;
        }
        else{
            $a->bukti2 = "kosong";
        }
        if ($r->hasFile('bukti3')) {
            $file = $r->file('bukti3');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('BUKTI3/',$filename);
            $a->bukti3 = $filename;
        }
        else{
            $a->bukti3 = "kosong";
        }
        
        $a->save();

        return redirect()->back()->with('sukses','sukses melaporkan kesalahan');
    }

    public function DPoint(){
        $tpoint = Lapor::addselect('points.beban')->
        leftjoin('points','lapors.id_point','points.id')->
        where('id_dilapor',Auth()->user()->id)->
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
            where('id_dilapor',Auth()->user()->id)->where('verif','s')->get(),
            'total_point' => $total_point,
        ];

        // dd(Auth()->user()->id,$data,Lapor::where('id_dilapor',Auth()->user()->id)->where('verif','s')->get());
        return view('Guru.Point.dpoint',compact('data'));
    }

    public function CDPoint($id){
        $data = [
            'chat' => ChatPoint::where('id_point',$id)->get(),
            'id' => $id,
            'id_penerima' => Lapor::find($id),
        ];
        // dd($data);
        return view('Guru.Point.cpoint',compact('data'));
    }

    public function TCDPoint(Request $r,$id){
        // dd($r,$id);
        $a = new ChatPoint;
        $a->id_point = $id;
        $a->id_pengirim = Auth()->user()->id;
        $a->id_penerima = '0';
        $a->chat = $r->chat;
        $a->save();
        
        return redirect('guru/point/'.$id);
    }

    public function PPoint()
    {
        $data = [
            'lapor' => Lapor::
            select(
                'lapors.id',
                'di.name as di',
                'di.id as id_di',
                'lapors.ket as ur',
                'points.beban',
                'points.ket',
                'lapors.bukti',
                'lapors.verif',
            )->
            leftjoin('users as di','lapors.id_dilapor','di.id')->
            leftjoin('points','lapors.id_point','points.id')->
            leftjoin('users as pe','lapors.id_pelapor','pe.id')->
            where('id_pelapor',Auth()->user()->id)->
            get(),
        ];
        return view('Guru.Point.laporan',compact('data'));
        // dd($data);
    }

    public function CPlapor($id)
    {
        // dd($id);
        $data = [
            'chat' => ChatLapor::where('id_point',$id)->get(),
            'id' => $id,
            'id_penerima' => Lapor::find($id),
        ];
        return view('Guru.Point.claporan',compact('data'));
    }

    public function TCPLapor(Request $r,$id)
    {   
        // dd($r,$id);
        $a = new ChatLapor;
        $a->id_point = $id;
        $a->id_pengirim = Auth()->user()->id;
        $a->id_penerima = '0';
        $a->chat = $r->chat;
        $a->save();
        
        return redirect('guru/plapor/'.$id);
    }
}
