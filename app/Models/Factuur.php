<?php

namespace App\Models;

use App\Models\Boekjaar;
use App\Models\Familielid;
use App\Models\Contributie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factuur extends Model
{
    use HasFactory;

    protected $table = 'factuur';

    protected $fillable = ["boekjaar_id", "factuurbedrag", "familie_id"];

    // Relationship to boekjaar
    public function boekjaar()
    {
        return $this->belongsTo(Boekjaar::class);
    }

    //relationship to contributie
    public function contributies()
    {
        return $this->hasMany(Contributie::class);
    }

    // relationship to familie

    public function familie()
    {
        return $this->belongsTo(Familie::class);
    }




}