<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Familie;
use App\Models\Boekjaar;
use App\Models\Lidsoort;
use App\Models\Familielid;
use Illuminate\Database\Seeder;
use App\Models\Leeftijdscategorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {
        User::factory(2)->create();

        User::factory()->create([
            'email' => 'info@ledenadministratie.nl',
            'password' => bcrypt('Welkom01'),
        ]);

        Boekjaar::create([
            'jaartal' => '2023',
            'basiscontributie' => '100'
        ]);
        Boekjaar::create([
            'jaartal' => '2022',
            'basiscontributie' => '90'
        ]);
        Boekjaar::create([
            'jaartal' => '2021',
            'basiscontributie' => '80'
        ]);
        Boekjaar::create([
            'jaartal' => '2020',
            'basiscontributie' => '70'
        ]);

        Leeftijdscategorie::create([
            'omschrijving' => 'jeugd',
            'ondergrens' => '0',
            'bovengrens' => '7',
            'kortingspercentage' => '50'
        ]);
        Leeftijdscategorie::create([
            'omschrijving' => 'aspirant',
            'ondergrens' => '8',
            'bovengrens' => '12',
            'kortingspercentage' => '40'
        ]);
        Leeftijdscategorie::create([
            'omschrijving' => 'junior',
            'ondergrens' => '13',
            'bovengrens' => '17',
            'kortingspercentage' => '25'
        ]);
        Leeftijdscategorie::create([
            'omschrijving' => 'senior',
            'ondergrens' => '18',
            'bovengrens' => '50',
            'kortingspercentage' => '0'
        ]);
        Leeftijdscategorie::create([
            'omschrijving' => 'oudere',
            'ondergrens' => '51',
            'bovengrens' => '120',
            'kortingspercentage' => '45'
        ]);

        Lidsoort::create([
            'omschrijving' => 'training',
            'contributiefactor' => '1'
        ]);
        Lidsoort::create([
            'omschrijving' => 'competitie',
            'contributiefactor' => '2'
        ]);

        $lidsoorten = Lidsoort::all();

        $families = Familie::factory(5)->create();

        foreach ($families as $familie) {
            foreach ($lidsoorten as $lidsoort) {
                Familielid::factory(3)->create([
                    'familie_id' => $familie->id,
                    'lidsoort_id' => $lidsoort->id
                ]);
            }
        }

        $this->call(ContributieSeeder::class);

    }
}