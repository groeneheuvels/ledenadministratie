<?php

namespace App\Models;

use App\Models\Lidsoort;
use App\Models\Leeftijdscategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contributie extends Model
{
    use HasFactory;

    protected $table = 'contributie';

    protected $fillable = ["contributiebedrag"];

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


}