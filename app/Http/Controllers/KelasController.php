<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;

class KelasController extends Controller
{
    public function Kelas(){		
    	$data = Kelas::
    	addselect('id')->
    	addselect('tahun')->
    	addselect('kelas')->
    	where('ket',request()->jurusan)->
    	whereBetween('tahun',[DATE('Y')-2,DATE('Y')])->
    	orderBy('tahun','DESC')->
    	get();
    	// dd($data);
    	return response()->json([
    		'status' => 'success',
    		'data'	=> $data,
    	]);
    }

    public function Siswa(){
        $data = User::
        addselect('users.id')->
        addselect('name')->
        join('profil_siswas','users.id','profil_siswas.id')->
        where('kelas_id',request()->kelas)->
        where('users.id','!=',Auth()->user()->id)->
        get();

        return response()->json([
            'status' => 'success',
            'data'  => $data,
        ]);
    }

    public function Wali(){
        $data = User::
        addselect('users.id')->
        addselect('users.name')->
        join('profil_siswas','users.id','profil_siswas.id')->
        where('profil_siswas.kelas_id',request()->kelas_id)->
        where('profil_siswas.wali','0')->
        get();

        return response()->json([
            'status' => 'success',
            'data'  => $data,
        ]);
    }

    public function ok(){

    }
}
