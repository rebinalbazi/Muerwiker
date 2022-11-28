<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Wohnen;
use File;

class WohnenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/wohnen.json");
        $wohnen = json_decode($json, true);

        foreach ($wohnen as $w) {
            Wohnen::query()->updateOrCreate([
                'ort' => $w['ort'],
                'strasse' => $w['strasse'],
                'imagePath' => $w['imagePath'],
                'notfallnummer' => $w['notfallnummer'],
                'ansprechpartner1_id' => $w['ansprechpartner1_id'],
                'ansprechpartner2_id' => $w['ansprechpartner2_id']
            ]);
        }
    }
}