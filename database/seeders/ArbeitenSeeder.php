<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Arbeiten;
use File;

class ArbeitenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/arbeiten.json");
        $arbeiten = json_decode($json, true);

        foreach ($arbeiten as $a) {
            Arbeiten::query()->updateOrCreate([
                'ort' => $a['ort'],
                'strasse' => $a['strasse'],
                'arbeitsbereiche' => $a['arbeitsbereiche'],
                'notfallnummer' => $a['notfallnummer'],
                'ansprechpartner1_id' => $a['ansprechpartner1_id'],
                'ansprechpartner2_id' => $a['ansprechpartner2_id']
            ]);
        }
    }
}
