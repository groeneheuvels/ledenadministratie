<?php

namespace Database\Seeders;

use App\Models\Boekjaar;
use App\Models\Lidsoort;
use App\Models\Familielid;
use App\Models\Contributie;
use Illuminate\Database\Seeder;
use App\Models\Leeftijdscategorie;
use Illuminate\Support\Facades\Log;
use Database\Factories\ContributieFactory;
use Symfony\Component\Console\Output\Output;

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
                $leeftijdscategorie = $familielid->berekenLeeftijdscategorie($leeftijdscategorieen, $boekjaar->jaartal);
                $contributiefactor = $familielid->lidsoort()->first()->contributiefactor;
                $contributiebedrag = 100 * ($contributiefactor) * (1 - ($leeftijdscategorie->kortingspercentage / 100));

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