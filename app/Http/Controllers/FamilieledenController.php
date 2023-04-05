<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use App\Models\Familieleden;
use Illuminate\Http\Request;

class FamilieledenController extends Controller
{
    // Show Familielid

    public function show(Familieleden $familielid, Familie $familie)
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

        Familieleden::create($formFields);

        return redirect('/')->with('message', 'Nieuw Familielid toegevoegd');
    }

    // Show Edit Familielid  Form
    public function edit(Familieleden $familielid, Familie $familie)
    {
        //dd($familielid->firstname);

        $familie = Familie::findOrFail($familielid->familie_id);
        /*dd([
        'familielid' => $familielid,
        'familie' => $familie,
        ]);*/

        return view('familieleden.edit', [
            'familielid' => $familielid,
            'familie' => $familie
        ]);
    }

    //Update Familielid Data
    public function update(Request $request, Familieleden $familielid)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'geboortedatum' => 'required'
        ]);

        $familielid->update($formFields);

        return back()->with('message', 'Familielid bewerking succesvol');
    }

    // Delete Familielid Data
    public function destroy(Familieleden $familielid)
    {
        $familielid->delete();
        return redirect('/')->with('message', 'Familielid verwijderd');
    }




}