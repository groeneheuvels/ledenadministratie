<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use App\Models\Lidsoort;
use App\Models\Familielid;
use App\Models\Contributie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FamilielidController extends Controller
{


    // Show Familielid

    public function show(Familielid $familielid, Familie $familie)
    {
        $familie = Familie::findOrFail($familielid->familie_id);


        $contributiebedrag = $familielid->berekenHuidigContributiebedrag($familielid);

        return view('familieleden.show', [
            'familielid' => $familielid,
            'familie' => $familie,
            'contributiebedrag' => $contributiebedrag
        ]);
    }

    //Show Create Familielid Form

    public function create(Request $request)
    {
        $familie_id = $request->input('familie_id');
        $familie = Familie::find($familie_id);
        $lidsoorten = Lidsoort::all();

        return view('familieleden.create', [
            'familie' => $familie,
            'lidsoorten' => $lidsoorten
        ]);
    }

    // Store Familielid Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'geboortedatum' => 'required | date',
            'lidsoort' => 'required'
        ]);

        $inputDate = $request->input('geboortedatum');
        $currentDate = date('Y-m-d');

        if ($inputDate > $currentDate) {
            return redirect()->back()->withErrors(['geboortedatum' => 'Geboortedatum kan niet in de toekomst liggen.']);
        }

        $formFields['familie_id'] = $request->input('familie_id');

        $lidsoort = Lidsoort::findOrFail($request->input('lidsoort'));

        $formFields['lidsoort_id'] = $lidsoort->id;


        Familielid::create($formFields);

        return redirect('/')->with('message', 'Nieuw Familielid toegevoegd');
    }

    // Show Edit Familielid  Form
    public function edit(Familielid $familielid)
    {

        $familie = Familie::findOrFail($familielid->familie_id);

        $lidsoorten = Lidsoort::all();


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