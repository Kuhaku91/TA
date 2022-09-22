<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BatasPoint;

class BatasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batas = new BatasPoint;
        $batas->batas = '100';
        $batas->ket = 'sp1';
        $batas->save();

        $batas = new BatasPoint;
        $batas->batas = '200';
        $batas->ket = 'sp2';
        $batas->save();

        $batas = new BatasPoint;
        $batas->batas = '300';
        $batas->ket = 'sp3';
        $batas->save();
    }
}
