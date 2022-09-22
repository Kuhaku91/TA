<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WaliController extends Controller
{
    public function Wali(){
        $data = User::find(Auth()->user()->id);
    	return view('Wali.wali',compact('data'));
    }
}
