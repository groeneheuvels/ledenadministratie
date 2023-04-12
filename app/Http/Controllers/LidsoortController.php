<?php

namespace App\Http\Controllers;

use App\Models\Lidsoort;
use Illuminate\Http\Request;

class LidsoortController extends Controller
{
    // Show all lidsoorten

    public function show()
    {
        $lidsoorten = Lidsoort::all();

        return view('lidsoorten.show', [
            'lidsoorten' => $lidsoorten
        ]);
    }

    // Show Create lidsoort Form
    public function create()
    {
        return view('lidsoorten.create');
    }

    // Store lidsoort Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'omschrijving' => 'required',
            'contributiefactor' => ['required', 'numeric', 'min:1', 'max:5', 'regex:/^\d+(\.\d{1})?$/']

        ]);

        lidsoort::create($formFields);

        return redirect('/lidsoorten')->with('message', 'Nieuwe lidsoort aangemaakt');
    }

    // Show Edit Form
    public function edit(lidsoort $lidsoort)
    {
        return view('lidsoorten.edit', ['lidsoort' => $lidsoort]);
    }

    //Update lidsoort Data
    public function update(Request $request, lidsoort $lidsoort)
    {
        $formFields = $request->validate([
            'omschrijving' => 'required',
            'contributiefactor' => 'required'
        ]);

        $lidsoort->update($formFields);

        return back()->with('message', 'lidsoort bewerking succesvol');
    }

    // Delete lidsoort Data
    public function destroy(lidsoort $lidsoort)
    {
        $lidsoort->delete();
        return redirect('/')->with('message', 'lidsoort verwijderd');
    }

}