<?php

namespace App\Http\Controllers;

use App\Models\Factuur;
use App\Models\Boekjaar;
use Illuminate\Http\Request;

class BoekjaarController extends Controller
{
    // Show all boekjaren

    public function show()
    {
        $boekjaren = Boekjaar::all();

        return view('boekjaren.show', [
            'boekjaren' => $boekjaren,
        ]);
    }

    // Show Create Boekjaar Form
    public function create()
    {
        return view('boekjaren.create');
    }

    // Store Boekjaar Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'jaartal' => ['required', 'numeric', 'min:1900', 'max:2100'],
            'basiscontributie' => ['required', 'numeric', 'min:1']
        ]);

        Boekjaar::create($formFields);

        return redirect('/boekjaren')->with('message', 'Nieuw Boekjaar aangemaakt');
    }

    // Show Edit Form
    public function edit(Boekjaar $boekjaar)
    {
        return view('boekjaren.edit', ['boekjaar' => $boekjaar]);
    }

    //Update Boekjaar Data

    public function update(Request $request, Boekjaar $boekjaar)
    {
        $formFields = $request->validate([
            'jaartal' => ['required', 'numeric', 'min:1900', 'max:2100'],
            'basiscontributie' => ['required', 'numeric', 'min:1']
        ]);

        $boekjaar->update($formFields);

        return back()->with('message', 'Boekjaar bewerking succesvol');
    }

    // Delete Boekjaar Data
    public function destroy(Boekjaar $boekjaar)
    {
        $boekjaar->delete();
        return redirect('/boekjaren')->with('message', 'Boekjaar verwijderd');
    }
}