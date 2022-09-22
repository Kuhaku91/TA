<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'TKJ A';
        $a->ket = 'Teknik Komputer Jaringan';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'TKJ B';
        $a->ket = 'Teknik Komputer Jaringan';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'TKJ C';
        $a->ket = 'Teknik Komputer Jaringan';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'MM A';
        $a->ket = 'Multimedia';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'MM B';
        $a->ket = 'Multimedia';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'EL A';
        $a->ket = 'Elektro';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'EL B';
        $a->ket = 'Elektro';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'AK A';
        $a->ket = 'Akuntansi';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'AK B';
        $a->ket = 'Akuntansi';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'TB A';
        $a->ket = 'Tata Boga';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'TB B';
        $a->ket = 'Tata Boga';
        $a->save();

        $a = new Kelas;
        $a->tahun = DATE('Y');
        $a->kelas = 'TB C';
        $a->ket = 'Tata Boga';
        $a->save();


    }
}
