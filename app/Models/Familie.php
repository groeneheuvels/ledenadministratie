<?php

namespace App\Models;

use App\Models\Factuur;
use App\Models\Familielid;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familie extends Model
{
    use HasFactory;

    protected $table = 'familie';
    protected $fillable = ['lastname', 'address', 'postcode', 'city'];

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

    // Relationship to Factuur
    public function facturen()
    {
        return $this->hasMany(Factuur::class);
    }
}