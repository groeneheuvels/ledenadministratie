<?php

namespace App\Models;

use App\Models\Familieleden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familie extends Model
{
    use HasFactory;

    //alternatieve optie is in AppServiceProvider.php de unguard in te stellen
    protected $fillable = ['lastname', 'address'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('lastname', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%')
                /*->orWhere('familielid', 'like', '%' . request('search') . '%')*/;
        }
    }

    // Relationship to Familieleden
    public function familieleden()
    {
        return $this->hasMany(Familieleden::class . 'familie_id');
    }

}