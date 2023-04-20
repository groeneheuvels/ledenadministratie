<?php

namespace App\Http\Controllers;

use App\Models\Factuur;
use App\Models\Boekjaar;
use App\Models\Familielid;
use App\Models\Contributie;
use Illuminate\Http\Request;

class FactuurController extends Controller
{
    // Show all facturen

    public function show()
    {
        $facturen = Factuur::with('boekjaar')->get();

        return view('facturen.show', [
            'facturen' => $facturen,

        ]);
    }

    // Show Create Factuur Form
    public function create()
    {
        return view('facturen.create');
    }

    // Store Factuur Data
    public function store(Request $request)
    {

        // Haal het boekjaar op waarvoor de contributie berekend moet worden
        $boekjaar = Boekjaar::where('jaartal', '=', $request->input('boekjaar'))->firstOrFail();

        // Haal alle leden op
        $familieleden = Familielid::all();
        $aantalFamilieLeden = Familielid::count();

        // Loop door alle leden heen en creeer een contributie
        foreach ($familieleden as $familielid) {
            // Roep de createContributie functie aan met het familielid en gevonden Boekjaar
            Contributie::createContributie($familielid, $boekjaar);
        }

        // Tel de meest recent aangemaakte contributies van het boekjaar op
        $totaalbedrag = Contributie::where('boekjaar_id', '=', $boekjaar->id)
            ->orderBy('created_at', 'desc')
            ->take($aantalFamilieLeden)
            ->sum('contributiebedrag');

        // Voeg het totaalbedrag toe aan de factuur tabel
        Factuur::create([
            'factuurbedrag' => $totaalbedrag,
            'boekjaar_id' => $boekjaar->id,
        ]);

        // Stuur de gebruiker door naar de factuur pagina
        return redirect()->back()->with('message', 'Factuur aangemaakt');
    }


    // Delete Factuur Data
    public function destroy(Factuur $factuur)
    {
        $factuur->delete();
        return redirect('/')->with('message', 'Factuur verwijderd');
    }
}