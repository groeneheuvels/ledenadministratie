<?php

namespace App\Models;

use App\Models\Contributie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leeftijdscategorie extends Model
{
    use HasFactory;

    protected $table = 'leeftijdscategorie';

    // Relatie tot contributies
    public function contributies()
    {
        return $this->hasMany(Contributie::class);
    }
}