<?php

namespace Database\Seeders;

use App\Models\Lidsoort;
use App\Models\Contributie;
use Illuminate\Database\Seeder;
use App\Models\Leeftijdscategorie;
use Database\Factories\ContributieFactory;

class ContributieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contributies = [
            ['leeftijdscategorie_id' => 1, 'lidsoort_id' => 1],
            ['leeftijdscategorie_id' => 1, 'lidsoort_id' => 2],
            ['leeftijdscategorie_id' => 2, 'lidsoort_id' => 1],
            ['leeftijdscategorie_id' => 2, 'lidsoort_id' => 2],
            ['leeftijdscategorie_id' => 3, 'lidsoort_id' => 1],
            ['leeftijdscategorie_id' => 3, 'lidsoort_id' => 2],
            ['leeftijdscategorie_id' => 4, 'lidsoort_id' => 1],
            ['leeftijdscategorie_id' => 4, 'lidsoort_id' => 2],
            ['leeftijdscategorie_id' => 5, 'lidsoort_id' => 1],
            ['leeftijdscategorie_id' => 5, 'lidsoort_id' => 2],
        ];

        foreach ($contributies as $contributie) {
            $leeftijdscategorie = Leeftijdscategorie::find($contributie['leeftijdscategorie_id']);
            $lidsoort = Lidsoort::find($contributie['lidsoort_id']);


            $contributiebedrag = 100 * ($lidsoort->contributiefactor) * (1 - ($leeftijdscategorie->kortingspercentage / 100));

            Contributie::create([
                'leeftijdscategorie_id' => $leeftijdscategorie->id,
                'lidsoort_id' => $lidsoort->id,
                'contributiebedrag' => $contributiebedrag
            ]);

        }


    }

}