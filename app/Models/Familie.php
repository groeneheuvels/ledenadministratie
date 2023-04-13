<?php

namespace App\Models;

use App\Models\Familielid;
use Illuminate\Support\Facades\DB;
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

    public function createJaarFactuur(Familie $familie)
    {
        $familieleden = Familielid::where('familie_id', $familie->id)->get();

        $latestContributions = DB::table('contributie')
            ->whereIn('contributie.familielid_id', $familieleden->pluck('id'))
            ->join(
                DB::raw('(SELECT familielid_id, MAX(created_at) AS latest_created_at FROM contributie GROUP BY familielid_id) latest_contributie'),
                function ($join) {
                    $join->on('contributie.familielid_id', '=', 'latest_contributie.familielid_id')
                        ->on('contributie.created_at', '=', 'latest_contributie.latest_created_at');
                }
            )
            ->select('contributie.familielid_id', 'contributie.lidsoort_id', 'contributie.boekjaar_id', 'contributie.leeftijdscategorie_id', 'contributie.contributiebedrag')
            ->get();

        $totalContributiebedrag = 0;

        foreach ($latestContributions as $contributie) {
            $totalContributiebedrag += $contributie->contributiebedrag;
        }

        return $totalContributiebedrag;
    }


}