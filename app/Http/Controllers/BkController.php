<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bk\profil_bk;
use Hash;

class BkController extends Controller
{
    public function Bk(){
        $data = [
            'user' => Auth()->user(),
            'profil' => profil_bk::find(Auth()->user()->id)
        ];
        // dd($data);
        return view('Bk.bk',compact('data'));
    }

    public function TBk(Request $r){
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
        return redirect('bk');
    }
}
