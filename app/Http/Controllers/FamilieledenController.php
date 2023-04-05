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








/*
// Store Familielid Data
public function store(Request $request, Familie $familie)
{
$formFields = $request->validate([
'firstname' => 'required',
'geboortedatum' => 'required'
]);
$formFields['familie_id'] = $familie->id;
Familieleden::create($formFields);
return redirect('/families/$familie->id')->with('message', 'Familielid aangemaakt');
//return back()->with('message', 'Familielid aangemaakt');
}
// Store Familielid Data advies
public function store(Request $request)
{
$familieId = $request->input('familie_id');
$familielid = new Familieleden;
// set the properties of the new familielid
$familielid->familie_id = $familieId;
$familielid->save();
return redirect('/families/' . $familieId);
}
*/



}