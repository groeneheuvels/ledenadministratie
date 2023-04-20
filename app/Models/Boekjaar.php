<?php

namespace App\Models;

use App\Models\Factuur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boekjaar extends Model
{
    use HasFactory;

    protected $table = 'boekjaar';
    protected $fillable = ['jaartal', 'basiscontributie'];


    // Relatie tot contributie
    public function contributies()
    {
        return $this->hasMany(Contributie::class);
    }

    // Relationship to Familielid
    public function facturen()
    {
        return $this->hasMany(Factuur::class);
    }
}