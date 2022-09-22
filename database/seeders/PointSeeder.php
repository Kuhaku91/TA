<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Point;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Point;
        $a->beban = '120';
        $a->ket = 'Merokok';
        $a->save();

        $a = new Point;
        $a->beban = '100';
        $a->ket = 'OK';
        $a->save();
        
        $a = new Point;
        $a->beban = '20';
        $a->ket = 'Save';
        $a->save();
        
        $a = new Point;
        $a->beban = '30';
        $a->ket = 'Cek';
        $a->save();
        
        $a = new Point;
        $a->beban = '10';
        $a->ket = 'Mencuri';
        $a->save();
        
        $a = new Point;
        $a->beban = '10';
        $a->ket = 'Lari';
        $a->save();


    }
}
