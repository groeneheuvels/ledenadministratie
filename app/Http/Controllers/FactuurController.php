<?php

namespace App\Http\Controllers;

use App\Models\Factuur;
use App\Models\Familie;
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
        $families = Familie::all();
        $boekjaren = Boekjaar::all();


        return view('facturen.create', [
            'families' => $families,
            'boekjaren' => $boekjaren
        ]);
    }

    // Store Factuur Data
    public function store(Request $request)
    {
        $boekjaar = Boekjaar::where('id', '=', $request->input('boekjaar'))->firstOrFail();
        $familie = Familie::where('id', '=', $request->input('familie'))->firstOrFail();
        $familieleden = Familielid::all();

        $factuur = Factuur::create([
            'boekjaar_id' => $boekjaar->id,
            'familie_id' => $familie->id
        ]);


        // Loop door alle leden heen en creeer een contributie
        foreach ($familieleden as $familielid) {
            if ($familielid->familie_id == $familie->id) {
                // Roep de createContributie functie aan met het familielid en gevonden Boekjaar
                $contributie = Contributie::createContributie($familielid, $boekjaar, $factuur);

            }
        }

        // $contributies = Contributie::where('factuur_id', '=', $factuur->id)->get();

        // dd($contributies);

        $totaalbedrag = Contributie::where('factuur_id', '=', $factuur->id)->sum('contributiebedrag');

        //  dd($totaalbedrag);

        $factuur->update([
            'factuurbedrag' => $totaalbedrag
        ]);


        // Stuur de gebruiker door naar de factuur pagina
        return redirect('/')->with('message', 'Factuur aangemaakt');
    }

    // markeer factuur als betaald (of onbetaald)
    public function update(Factuur $factuur)
    {
        $factuur->betaald = !$factuur->betaald;
        $factuur->save();
        return redirect('/')->with('message', 'Factuur status bijgewerkt');
    }


    // Delete Factuur Data
    public function destroy(Factuur $factuur)
    {
        $factuur->delete();
        return redirect('/')->with('message', 'Factuur verwijderd');
    }
}