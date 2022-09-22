<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DataSp;
use App\Models\Siswa\profil_siswa;
use App\Models\BatasPoint;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sp($a){
        if (DataSp::where('id_user',$a)->first()) {
            return 'ono';
        }
        else{
            return 'gaono';
        }
    }

    public function spwali($a){
        $id = profil_siswa::where('wali',$a)->first();

        if (DataSp::where('id_user',$id->id)->first()) {
            return 'ono';
        }
        else{
            return 'gaono';
        }
    }

    public function point($a){

        $tpoint = Lapor::addselect('points.beban')->
        leftjoin('points','lapors.id_point','points.id')->
        where('id_dilapor',$a)->
        where('verif','s')->
        get();

        $total_point = 0;
        foreach ($tpoint as $tpoint) {
            $total_point +=$tpoint->beban;
        }

        return $total_point;
    }

    public function status($a){
        if (DataSp::where('id_user',$a)->first()) {
            $b = DataSp::where('id_user',$a)->first();
            return $b->status_sp;
        }
        else{
            return 'batal';
        }
    }

    public function kelas($a){
        $id = profil_siswa::where('wali',$a)->first();

        $data = User::
        join('profil_siswas','users.id','profil_siswas.id')->
        join('kelas','profil_siswas.kelas_id','kelas.id')->
        where('profil_siswas.wali',$a)->
        first();

        // dd($data);

        $b = explode(' ',$data->kelas);
        $c = Date('Y')-$data->tahun+10;
        // dd($data->ket.' '.$c.' '.$b[1]);

        return $data->ket.' '.$c.' '.$b[1];
    }

    public function nama_kelas($a)
    {
        $data = User::
        join('profil_siswas','users.id','profil_siswas.id')->
        join('kelas','profil_siswas.kelas_id','kelas.id')->
        where('kelas_id',$a)->
        first();
        $b = explode(' ',$data->kelas);
        $c = Date('Y')-$data->tahun+10;
        return $data->ket.' '.$c.' '.$b[1];
    }

    public function checksp($a,$b,$c)
    {   

        if ($c!='batal') {
            $e = BatasPoint::where('ket',$c)->first();
            if ($b>=$e->batas) {
                return true;
            }
            else{
                return false;
            }
        }
        return true;
        return $a.' '.$b.' '.$c;
    }

    public function dapatsp($a,$b)
    {   
        // return $a.'dapat'.$b;
        $c = 0;
        $d = BatasPoint::all();
        $e = array(); // key nilai
        $f = array(); // nilai

        $x = '';
        $z = '';
        
        foreach ($d as $d) {
            $e[]=[
                $d->ket,
                intval($d->batas)
            ];
            $f[]=[intval($d->batas)];
        }
        sort($e);
        foreach ($e as $e) {
            // echo $e[0];
            // echo $e[1];
            if ($b=='0') {
                $x='Tidak Sp';
                $z='';
            }
            else if ($b>=$e[1]) {
                $x=$e[0].' ( '.$e[1].' )';
                $z=$e[1];
            }
        }
        if ($x==''&&$z=='') {
            $x='sp3';
            $z=BatasPoint::where('ket','sp3')->first()->batas;
            return $x.'( '.$z.' ) karena point anda '.$b;
        }
        return $x.' karena point anda '.$b;
        // $f = rsort($e);
        // dd($d);
    }
}
