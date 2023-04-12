<?php

namespace App\Models;

use App\Models\Familielid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familie extends Model
{
    use HasFactory;

    protected $table = 'familie';

    //alternatieve optie is in AppServiceProvider.php de unguard in te stellen
    protected $fillable = ['lastname', 'address'];

    // Search functie
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('lastname', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to Familielid
    public function familieleden()
    {
        return $this->hasMany(Familielid::class);
    }

    // Bereken Huidig Totaal Familie contributie bedrag
    public function berekenHuidigTotaalContributiebedrag()
    {
        $total = 0;
        foreach ($this->familieleden as $familielid) {
            $contributiebedrag = $familielid->berekenHuidigContributiebedrag($familielid);
            $total += $contributiebedrag;
        }
        return $total;
    }

}