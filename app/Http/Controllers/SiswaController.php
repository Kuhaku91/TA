<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa\profil_siswa;

class SiswaController extends Controller
{
    public function Siswa(){
    	$data = [
    		'user' => Auth()->user(),
    		'profil' => profil_siswa::join('kelas','profil_siswas.kelas_id','kelas.id')->where('profil_siswas.id',Auth()->user()->id)->first(),
    	];
    	// dd($data);
    	return view('Siswa.siswa',compact('data'));
    }
}
