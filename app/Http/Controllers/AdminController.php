<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function Admin(){
        $data = User::find(Auth()->user()->id);
    	return view('Admin.admin',compact('data'));
    }

    public function TAdmin(Request $r){
        if ($r->password!=null) {
            User::where('id',Auth()->user()->id)->update([
                'name' => $r->name,
                'password' => Hash::make($r->password),
                'email' => $r->email,
            ]);
        }
        else{
            User::where('id',Auth()->user()->id)->update([
                'name' => $r->name,
                'email' => $r->email,
            ]);
        }
        return redirect('admin');
    }
}
