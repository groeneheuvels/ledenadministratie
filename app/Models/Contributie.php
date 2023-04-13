<?php

namespace App\Models;

use App\Models\Familie;
use App\Models\Lidsoort;
use App\Models\Familielid;
use App\Models\Leeftijdscategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contributie extends Model
{
    use HasFactory;

    protected $table = 'contributie';

    protected $fillable = ["contributiebedrag", "boekjaar_id", "lidsoort_id", "leeftijdscategorie_id", "familielid_id"];

    // Relatie tot boekjaar 
    public function boekjaren()
    {
        return $this->belongsTo(Boekjaar::class);
    }

    // Relatie 
    public function familielid()
    {
        return $this->belongsTo(Familielid::class);
    }

    // Relatie tot lidsoort
    // Dit is de lidsoort tentijde van aanmaken van de contributie
    // kan eventueel weg als je dit niet vast wil leggen
    public function lidsoort()
    {
        return $this->belongsTo(Lidsoort::class);
    }

    // Relatie tot leeftijdscategorie
    // Dit is de leeftijdscategorie ten tijde van aanmaken van contributie
    // Kan eventueel weg als je dit niet wil tracken en alleen het bedrag wil bewaren
    public function leeftijdscategorie()
    {
        return $this->belongsTo(Leeftijdscategorie::class);
    }

    static function createContributie(Familielid $familielid, Boekjaar $boekjaar)
    {
        $leeftijdscategorieen = Leeftijdscategorie::all();

        $leeftijdscategorie = $familielid->berekenLeeftijdscategorie($leeftijdscategorieen, $boekjaar->jaartal);
        $contributiefactor = $familielid->lidsoort()->first()->contributiefactor;
        $contributiebedrag = $boekjaar->basiscontributie * ($contributiefactor) * (1 - ($leeftijdscategorie->kortingspercentage / 100));

        return Contributie::create([
            'familielid_id' => $familielid->id,
            'boekjaar_id' => $boekjaar->id,
            'lidsoort_id' => $familielid->lidsoort_id,
            'leeftijdscategorie_id' => $leeftijdscategorie->id,
            'contributiebedrag' => $contributiebedrag
        ]);
    }


}