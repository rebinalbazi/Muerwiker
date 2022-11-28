<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Sonstige;
use File;

class SonstigeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/sonstige.json");
        $sonstiges = json_decode($json, true);

        foreach ($sonstiges as $s) {
            Sonstige::query()->updateOrCreate([
                'id' => $s['id'],
                'bereich' => $s['bereich'],
                'iconPath' => $s['iconPath'],
                'notfallnummer' => $s['notfallnummer'],
                'ansprechpartner1_id' => $s['ansprechpartner1_id'],
                'ansprechpartner2_id' => $s['ansprechpartner2_id']
            ]);
        }
    }
}
