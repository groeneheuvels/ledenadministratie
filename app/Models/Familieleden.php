<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familieleden extends Model
{
    use HasFactory;

    public function familie()
    {
        return $this->belongsTo(Familie::class, 'familie_id');
    }
}