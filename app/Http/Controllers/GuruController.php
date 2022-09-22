<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru\profil_guru;

class GuruController extends Controller
{
    public function Guru(){
    	$data = [
    		'user' => Auth()->user(),
    		'profil' => profil_guru::find(Auth()->user()->id)
    	];
    	// dd($data);
    	return view('Guru.guru',compact('data'));
    }
}
