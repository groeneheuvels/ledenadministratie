<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familieleden extends Model
{
    use HasFactory;

    //alternatieve optie is in AppServiceProvider.php de unguard in te stellen
    protected $fillable = ['firstname', 'geboortedatum', 'familie_id'];

    protected $table = 'familieledens';

    public function familie()
    {
        return $this->belongsTo(Familie::class, 'familie_id');
    }
}