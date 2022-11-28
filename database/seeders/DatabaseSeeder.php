<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AnsprechpartnerSeeder;
use Database\Seeders\WohnenSeeder;
use Database\Seeders\ArbeitenSeeder;
use Database\Seeders\TagesstaetteSeeder;
use Database\Seeders\SonstigeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AnsprechpartnerSeeder::class);
        $this->call(WohnenSeeder::class);
        $this->call(ArbeitenSeeder::class);
        $this->call(TagesstaetteSeeder::class);
        $this->call(VerwaltungSeeder::class);
        $this->call(SonstigeSeeder::class);
    }
}
