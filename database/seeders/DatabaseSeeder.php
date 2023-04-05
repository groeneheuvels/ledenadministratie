<?php

namespace Database\Seeders;

use App\Models\Boekjaar;
use App\Models\User;
use App\Models\Familie;
use App\Models\Familieleden;
use App\Models\Leeftijdscategorie;
use App\Models\Lidsoort;
use Illuminate\Database\Seeder;

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

        $familie_jansen = Familie::factory()->create([
            'lastname' => 'Jansen',
        ]);

        Familieleden::factory(3)->create([
            'familie_id' => $familie_jansen->id
        ]);

        $familie_kooi = Familie::factory()->create([
            'lastname' => 'Kooi',
        ]);

        Familieleden::factory(4)->create([
            'familie_id' => $familie_kooi->id
        ]);

        $familie_jaspers = Familie::factory()->create([
            'lastname' => 'Jaspers',
        ]);

        Familieleden::factory(6)->create([
            'familie_id' => $familie_jaspers->id
        ]);

        //Familie::factory(10)->create();

        //Familieleden::factory(3)->create();

        Boekjaar::create([
            'jaartal' => '2022',
        ]);
        Boekjaar::create([
            'jaartal' => '2021',
        ]);
        Boekjaar::create([
            'jaartal' => '2020',
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
    }
}