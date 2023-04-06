<?php

namespace Database\Seeders;

use App\Models\Boekjaar;
use App\Models\Lidsoort;
use App\Models\Contributie;
use App\Models\Familielid;
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

        $familieleden = Familielid::all();
        $boekjaren = Boekjaar::all();
        $leeftijdscategorieen = Leeftijdscategorie::all();


        foreach ($boekjaren as $boekjaar) {
            foreach ($familieleden as $familielid) {

                $leeftijdscategorie = $leeftijdscategorieen[0]; // TODO: berekenen op basis van leeftijd
                $contributiebedrag = 100; // TODO: berekenen op basis van categorie en soort


                Contributie::create([
                    'familielid_id' => $familielid->id,
                    'boekjaar_id' => $boekjaar->id,
                    'lidsoort_id' => $familielid->lidsoort_id,
                    'leeftijdscategorie_id' => $leeftijdscategorie->id,
                    'contributiebedrag' => $contributiebedrag
                ]);
            }
        }

    }

}