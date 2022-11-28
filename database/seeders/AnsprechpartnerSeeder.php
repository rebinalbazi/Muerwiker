<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ansprechpartner;
use File;

class AnsprechpartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/ansprechpartner.json");
        $ansprechpartner = json_decode($json, true);

        foreach ($ansprechpartner as $a) {
            Ansprechpartner::query()->updateOrCreate([
                'id' => $a['id'],
                'name' => $a['name'],
                'telefon' => $a['telefon'],
                'email' => $a['email'],
                'imagePath' => $a['imagePath']
            ]);
        }
    }
}
