<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TableGambar;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new TableGambar;
        $a->logo = '';
        $a->ttd = '';
        $a->save();
    }
}
