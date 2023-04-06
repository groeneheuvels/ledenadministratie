<?php

namespace App\Models;

use App\Models\Lidsoort;
use App\Models\Leeftijdscategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contributie extends Model
{
    use HasFactory;

    // Relatie tot lidsoort
    public function lidsoort()
    {
        return $this->belongsTo(Lidsoort::class);
    }

    // Relatie tot leeftijdscategorie
    public function leeftijdscategorie()
    {
        return $this->belongsTo(Leeftijdscategorie::class);
    }
}