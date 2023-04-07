<?php

namespace App\Models;

use App\Models\Lidsoort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familielid extends Model
{
    use HasFactory;

    //alternatieve optie is in AppServiceProvider.php de unguard in te stellen
    protected $fillable = ['firstname', 'geboortedatum', 'familie_id'];
    protected $table = 'familielid';

    public function familie()
    {
        return $this->belongsTo(Familie::class);
    }

    public function lidsoort()
    {
        return $this->belongsTo(Lidsoort::class);
    }

    public function contributies()
    {
        return $this->hasMany(Contributie::class);
    }

    public function getLidsoort()
    {
        return Lidsoort::find($this->lidsoort_id);
    }

    public function berekenLeeftijdscategorie($alle_leeftijdscategorieen, $referentiejaar)
    {
        // hier willen we ten allen tijden kunnen berekenen in welke leeftijdscategorie
        // het lid valt op een bepaald moment
        // dat moment is het referntiejaar
        // alle leeftijdscategorieen zijn ook de cfategorieen van dat ene moment

        // eerst kijken we aan de hand van het referentiejaar wat de leeftijd in jaren is
        // van het lid
        // vervolgens gaan we alle leeftijdscateogrieen langsloopen
        // en dan kijken we bij elke categorie of de leeftijd past binnen de referentie
        // de returnwaarde is dan de leeftijdscategorie die past bij dat referentiejaar

        $lid_leeftijd_in_referentiejaar = date_diff(date_create($this->geboortedatum), date_create($referentiejaar))->y;

        foreach ($alle_leeftijdscategorieen as $leeftijdscategorie) {
            if ($lid_leeftijd_in_referentiejaar >= $leeftijdscategorie->ondergrens && $lid_leeftijd_in_referentiejaar <= $leeftijdscategorie->bovengrens) {
                return $leeftijdscategorie;
            }
        }
    }
}