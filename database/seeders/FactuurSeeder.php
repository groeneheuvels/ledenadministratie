<?php

namespace Database\Seeders;

use App\Models\Factuur;
use App\Models\Familie;
use App\Models\Boekjaar;
use App\Models\Familielid;
use App\Models\Contributie;
use Illuminate\Database\Seeder;

class FactuurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $families = Familie::all();
        $boekjaren = Boekjaar::all();
        $familieleden = Familielid::all();

        foreach ($boekjaren as $boekjaar) {
            foreach ($families as $familie) {
                $factuur = Factuur::create([
                    'boekjaar_id' => $boekjaar->id,
                    'familie_id' => $familie->id
                ]);

                if ($boekjaar->id > 1) {
                    $factuur->update([
                        'betaald' => true
                    ]);
                }

                // Loop door alle leden heen en creeer een contributie
                foreach ($familieleden as $familielid) {
                    if ($familielid->familie_id == $familie->id) {
                        // Roep de createContributie functie aan met het familielid en gevonden Boekjaar
                        $contributie = Contributie::createContributie($familielid, $boekjaar, $factuur);

                    }
                }

                $totaalbedrag = Contributie::where('factuur_id', '=', $factuur->id)->sum('contributiebedrag');

                $factuur->update([
                    'factuurbedrag' => $totaalbedrag
                ]);
            }
        }

    }
}