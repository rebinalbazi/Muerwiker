<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tagesstaette;
use File;

class TagesstaetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/tagesstaette.json");
        $tagesstaette = json_decode($json, true);

        foreach ($tagesstaette as $t) {
            Tagesstaette::query()->updateOrCreate([
                'id' => $t['id'],
                'ort' => $t['ort'],
                'notfallnummer' => $t['notfallnummer'],
                'ansprechpartner1_id' => $t['ansprechpartner1_id'],
                'ansprechpartner2_id' => $t['ansprechpartner2_id']
            ]);
        }
    }
}
