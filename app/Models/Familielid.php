<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}