<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AkunController extends Controller
{
    public function TWali(Request $r){
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
        return redirect('wali');
    }
}
