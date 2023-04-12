<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leeftijdscategorie;

class LeeftijdscategorieController extends Controller
{
    // Show all Leeftijdscategorieen

    public function show()
    {
        $leeftijdscategorieen = Leeftijdscategorie::all();

        return view('leeftijdscategorieen.show', [
            'leeftijdscategorieen' => $leeftijdscategorieen
        ]);
    }

    // Show Create Leeftijdscategorie Form
    public function create()
    {
        return view('leeftijdscategorieen.create');
    }

    // Store Leeftijdscategorie Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'omschrijving' => 'required',
            'ondergrens' => ['required', 'numeric', 'min:0', 'max:99', 'regex:/^\d+(\.\d{1})?$/'],
            'bovengrens' => ['required', 'numeric', 'min:0', 'max:200', 'regex:/^\d+(\.\d{1})?$/'],
            'kortingspercentage' => ['required', 'numeric', 'min:0', 'max:99', 'regex:/^\d+(\.\d{1})?$/']

        ]);

        Leeftijdscategorie::create($formFields);

        return redirect('/leeftijdscategorieen')->with('message', 'Nieuwe leeftijdscategorie aangemaakt');
    }

    // Show Edit Form
    public function edit(Leeftijdscategorie $leeftijdscategorie)
    {
        return view('leeftijdscategorieen.edit', ['leeftijdscategorie' => $leeftijdscategorie]);
    }

    //Update Leeftijdscategorie Data
    public function update(Request $request, Leeftijdscategorie $leeftijdscategorie)
    {
        $formFields = $request->validate([
            'omschrijving' => 'required',
            'ondergrens' => ['required', 'numeric', 'min:0', 'max:99', 'regex:/^\d+(\.\d{1})?$/'],
            'bovengrens' => ['required', 'numeric', 'min:0', 'max:200', 'regex:/^\d+(\.\d{1})?$/'],
            'kortingspercentage' => 'required'
        ]);

        $leeftijdscategorie->update($formFields);

        return back()->with('message', 'leeftijdscategorie bewerking succesvol');
    }

    // Delete Leeftijdscategorie Data
    public function destroy(Leeftijdscategorie $leeftijdscategorie)
    {
        $leeftijdscategorie->delete();
        return redirect('/leeftijdscategorieen')->with('message', 'leeftijdscategorie verwijderd');
    }

}