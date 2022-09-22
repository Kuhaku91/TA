<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(Request $r){
    	// dd($Request);
    	// $data = $request->validate([
    	// 	'email'	=> 'required|email:dns',
    	// 	'password' => 'required',
    	// ]);
        // dd($data);
    	if (Auth::attempt(['email'=>$r->email,'password'=>$r->password,'role'=>'admin'])) {
            $r->session()->regenerate();
            return redirect()->intended('admin');
    		// dd(Auth(),'admin');
        }
        else if (Auth::attempt(['email'=>$r->email,'password'=>$r->password,'role'=>'bk'])) {
            $r->session()->regenerate();
            return redirect()->intended('bk');
    		// dd(Auth(),'guru');
        }
        else if (Auth::attempt(['email'=>$r->email,'password'=>$r->password,'role'=>'guru'])) {
            $r->session()->regenerate();
            return redirect()->intended('guru');
            // dd(Auth(),'guru');
        }
        else if (Auth::attempt(['email'=>$r->email,'password'=>$r->password,'role'=>'siswa'])) {
            $r->session()->regenerate();
            return redirect()->intended('siswa');
    		// dd(Auth()->user(),'siswa');
        }
        else if (Auth::attempt(['email'=>$r->email,'password'=>$r->password,'role'=>'wali'])) {
            $r->session()->regenerate();
            return redirect()->intended('wali');
    		// dd(Auth(),'wali');
        }
    	// dd($r);
        return redirect()->intended('/');
    }

    public function Logout(){
        Auth::logout();
        return redirect('/');
    }
}
