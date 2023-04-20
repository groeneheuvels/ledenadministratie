<?php

namespace App\Models;

use App\Models\Boekjaar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factuur extends Model
{
    use HasFactory;

    protected $table = 'factuur';

    protected $fillable = ["factuurbedrag", "boekjaar_id"];

    // Relationship to boekjaar
    public function boekjaar()
    {
        return $this->belongsTo(Boekjaar::class);
    }

}