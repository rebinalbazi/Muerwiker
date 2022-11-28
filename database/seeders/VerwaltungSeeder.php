<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Verwaltung;
use File;

class VerwaltungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/verwaltung.json");
        $verwaltung = json_decode($json, true);

        foreach ($verwaltung as $v) {
            Verwaltung::query()->updateOrCreate([
                'id' => $v['id'],
                'bereich' => $v['bereich'],
                'notfallnummer' => $v['notfallnummer'],
                'ansprechpartner1_id' => $v['ansprechpartner1_id'],
                'ansprechpartner2_id' => $v['ansprechpartner2_id']
            ]);
        }
    }
}
