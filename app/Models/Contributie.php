<?php

namespace App\Models;

use App\Models\Factuur;
use App\Models\Familie;
use App\Models\Lidsoort;
use App\Models\Familielid;
use App\Models\Leeftijdscategorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contributie extends Model
{
    use HasFactory;

    protected $table = 'contributie';

    protected $fillable = ["contributiebedrag", "boekjaar_id", "lidsoort_id", "leeftijdscategorie_id", "familielid_id", "factuur_id"];

    // Relatie tot boekjaar 
    public function boekjaar()
    {
        return $this->belongsTo(Boekjaar::class);
    }

    // Relatie tot familielid
    public function familielid()
    {
        return $this->belongsTo(Familielid::class);
    }

    // Relatie tot lidsoort
    // Dit is de lidsoort tentijde van aanmaken van de contributie
    public function lidsoort()
    {
        return $this->belongsTo(Lidsoort::class);
    }

    // Relatie tot leeftijdscategorie
    // Dit is de leeftijdscategorie ten tijde van aanmaken van contributie
    public function leeftijdscategorie()
    {
        return $this->belongsTo(Leeftijdscategorie::class);
    }

    // Relatie tot factuur
    public function factuur()
    {
        return $this->belongsTo(Factuur::class);
    }

    static function createContributie(Familielid $familielid, Boekjaar $boekjaar, Factuur $factuur)
    {
        $leeftijdscategorieen = Leeftijdscategorie::all();

        $leeftijdscategorie = $familielid->berekenLeeftijdscategorie($leeftijdscategorieen, $boekjaar->jaartal);
        $contributiefactor = $familielid->lidsoort()->first()->contributiefactor;
        $contributiebedrag = $boekjaar->basiscontributie * ($contributiefactor) * (1 - ($leeftijdscategorie->kortingspercentage / 100));

        return Contributie::create([
            'factuur_id' => $factuur->id,
            'familielid_id' => $familielid->id,
            'boekjaar_id' => $boekjaar->id,
            'lidsoort_id' => $familielid->lidsoort_id,
            'leeftijdscategorie_id' => $leeftijdscategorie->id,
            'contributiebedrag' => $contributiebedrag
        ]);
    }


}