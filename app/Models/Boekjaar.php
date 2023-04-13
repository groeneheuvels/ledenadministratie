<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boekjaar extends Model
{
    use HasFactory;

    protected $table = 'boekjaar';
    protected $fillable = ['jaartal', 'basiscontributie'];


    // Relatie tot contributie via BoekjaarContributie tabel
    public function contributies()
    {
        return $this->hasMany(Contributie::class);
    }
}