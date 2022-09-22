<?php

namespace App\Http\Controllers\Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataSp;
use App\Models\RekapSp;
use App\Models\User;
use App\Models\Siswa\profil_siswa;
use App\Models\BatasPoint;

//email
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;


class SpController extends Controller
{
  public function BKSP()
  {	
    $data = [
      'guru' => User::join('profil_gurus','users.id','profil_gurus.id')->get(),
      'siswa' => User::join('profil_siswas','users.id','profil_siswas.id')->get(),
    ];

    return view('Bk.Sp.Sp',compact('data'));
  }

  public function TBKSP(Request $r){
    	// dd($r);
    $a = explode('-',$r->sp);
    if ($a[1]=='sp1') {
      $this->data($a);
    }
    if ($a[1]=='sp2') {
      $this->data($a);
    }
    if ($a[1]=='sp3') {
      $this->data($a);
    }
    if ($a[1]=='batal') {
      DataSp::where('id_user',$a[0])->delete();
    }

    return redirect('bk/sp');
  }

  public function data($a){
    // dd($a);
    if (DataSp::where('id_user',$a[0])->first()) {
      DataSp::where('id_user',$a[0])->update(['status_sp'=>$a[1]]);
    }
    else{
      DataSp::create([
       'id_user' => $a[0],
       'status_sp' => $a[1],
     ]);
    }
    if (RekapSp::where('id_user',$a[0])->where('status_sp',$a[1])->first()) {
      RekapSp::where('id_user',$a[0])->where('status_sp',$a[1])->update(['status_sp'=>$a[1]]);
      DataSp::where('id_user',$a[0])->update(['status_sp'=>$a[1]]);
        // dd('update');
    }
    else{
      RekapSp::create([
       'id_user' => $a[0],
       'status_sp' => $a[1],
     ]);
    }

    $name = User::find($a[0])->name;
        // $email = 'rulkhoi617@gmail.com';
    $email = User::find($a[0])->email;
    $data = [
      'title' => 'Notifikasi Penting!',
      'name' => $name,
      'sp' => $a[1],
      'url' => 'https://aantamim.id',
    ];

    if (@fsockopen("www.google.com", 80)) {
      // dd('ada');
      Mail::to($email)->send(new MailNotify($data));
      return true; 
    }
    return true;
    // dd('tidak');
  }

  public function em($a){

    $b = User::find($a[0]);
    if ($b->role=='guru') {
            // dd('cek');
    }
    else{
      $c = profil_siswa::find($b->id);
      $d = User::find($c->wali);
      $x = 'rulkhoi617@gmail.com';
      Mail::to($x)->send(new MailNotify($a[1]));
            // dd($d);
    }
  }
}
