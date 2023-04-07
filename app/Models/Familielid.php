<?php

namespace App\Models;

use App\Models\Lidsoort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familielid extends Model
{
    use HasFactory;

    //alternatieve optie is in AppServiceProvider.php de unguard in te stellen
    protected $fillable = ['firstname', 'geboortedatum', 'familie_id', 'lidsoort_id'];
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


    public function berekenLeeftijdscategorie($alle_leeftijdscategorieen, $referentiejaar)
    {
        $lid_leeftijd_in_referentiejaar = date_diff(date_create($this->geboortedatum), date_create($referentiejaar))->y;

        foreach ($alle_leeftijdscategorieen as $leeftijdscategorie) {
            if ($lid_leeftijd_in_referentiejaar >= $leeftijdscategorie->ondergrens && $lid_leeftijd_in_referentiejaar <= $leeftijdscategorie->bovengrens) {
                return $leeftijdscategorie;
            }
        }
    }
}