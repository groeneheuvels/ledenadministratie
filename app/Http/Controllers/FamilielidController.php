<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use App\Models\Familielid;
use App\Models\Lidsoort;
use Illuminate\Http\Request;

class FamilielidController extends Controller
{
    // Show Familielid

    public function show(Familielid $familielid, Familie $familie)
    {
        $familie = Familie::findOrFail($familielid->familie_id);
        /*dd([
        'familielid' => $familielid,
        'familie' => $familie,
        ]);*/

        return view('familieleden.show', [
            'familielid' => $familielid,
            'familie' => $familie,
        ]);
    }

    //Show Create Familielid Form

    public function create(Request $request)
    {
        $familie_id = $request->input('familie_id');
        $familie = Familie::find($familie_id);

        return view('familieleden.create', compact('familie'));
    }

    // Store Familielid Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'geboortedatum' => 'required'
        ]);

        $formFields['familie_id'] = $request->input('familie_id');

        Familielid::create($formFields);

        return redirect('/')->with('message', 'Nieuw Familielid toegevoegd');
    }

    // Show Edit Familielid  Form
    public function edit(Familielid $familielid)
    {

        $familie = Familie::findOrFail($familielid->familie_id);
        // dd($familie->lastname);

        $lidsoorten = Lidsoort::all();
        /*dd([
        'familielid' => $familielid,
        'familie' => $familie,
        ]);*/



        return view('familieleden.edit', [
            'familielid' => $familielid,
            'familie' => $familie,
            'lidsoorten' => $lidsoorten
        ]);
    }

    //Update Familielid Data
    public function update(Request $request, Familielid $familielid)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'geboortedatum' => 'required',
            'lidsoort_id' => 'required'
        ]);

        $familielid->update($formFields);

        return back()->with('message', 'Familielid bewerking succesvol');
    }

    // Delete Familielid Data
    public function destroy(Familielid $familielid)
    {
        $familielid->delete();
        return redirect('/')->with('message', 'Familielid verwijderd');
    }




}