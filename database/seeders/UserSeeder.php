<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa\profil_siswa;
use App\Models\Guru\profil_guru;
use App\Models\BK\profil_bk;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = new User;
    	$admin->name = 'Admin';
    	$admin->email = 'admin@gmail.com';
    	$admin->password = Hash::make('admin');
    	$admin->role = 'admin';
    	$admin->save();

    	$bk = new User;
        $bk->name = 'GuruBk';
        $bk->email = 'bk@gmail.com';
        $bk->password = bcrypt('bk');
        $bk->role = 'bk';
        $bk->save();
        $id_bk = $bk->id;

        $p_bk = new profil_bk;
        $p_bk->id = $id_bk;
        $p_bk->save();

        $guru = new User;
        $guru->name = 'Guru';
        $guru->email = 'guru@gmail.com';
        $guru->password = bcrypt('guru');
        $guru->role = 'guru';
        $guru->save();
        $id_guru = $guru->id;

        $p_guru = new profil_guru;
        $p_guru->id = $id_guru;
        $p_guru->save();
    }
}
