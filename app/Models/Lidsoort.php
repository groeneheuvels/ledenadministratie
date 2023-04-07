<?php

namespace App\Models;

use App\Models\Contributie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lidsoort extends Model
{
    use HasFactory;

    protected $table = 'lidsoort';
    protected $fillable = ['omschrijving', 'contributiefactor'];



    // Relatie tot familieleden
    public function familieleden()
    {
        return $this->hasMany(Familielid::class);
    }

    // Relatie tot contributies
    public function contributies()
    {
        return $this->hasMany(Contributie::class);
    }

}