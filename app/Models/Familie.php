<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familie extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('lastname', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%');
        }
    }
}