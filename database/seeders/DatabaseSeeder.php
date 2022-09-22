<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PointSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(GambarSeeder::class);
        $this->call(BatasSeeder::class);
    }
}
