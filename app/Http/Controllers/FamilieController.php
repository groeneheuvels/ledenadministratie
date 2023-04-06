<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use App\Models\Familielid;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FamilieController extends Controller
{
    // Show all Families

    public function index()
    {
        //dd(request('lastname'));
        // overweeg ipg simplePaginate gewoon paginate te doen, dan wel opmaak aanpassen 2:43:07
        return view('families.index', [
            'families' => Familie::latest()->filter(request(['search']))->SimplePaginate(6)
        ]);
    }

    // Show single Familie

    public function show(Familie $familie)
    {
        return view('families.show', [
            'familie' => $familie
        ]);
    }

    // Show Create Familie Form
    public function create()
    {
        return view('families.create');
    }

    // Store Familie Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'lastname' => 'required',
            'address' => ['required', Rule::unique('families', 'address')]
        ]);

        Familie::create($formFields);

        return redirect('/')->with('message', 'Nieuwe Familie aangemaakt');
    }

    // Show Edit Form
    public function edit(Familie $familie)
    {
        //dd($familie->address);
        return view('families.edit', ['familie' => $familie]);
    }

    //Update Familie Data
    public function update(Request $request, Familie $familie)
    {
        $formFields = $request->validate([
            'lastname' => 'required',
            'address' => 'required'
        ]);

        $familie->update($formFields);

        return back()->with('message', 'Familie bewerking succesvol');
    }


    // Delete Familie Data
    public function destroy(Familie $familie)
    {
        $familie->delete();
        return redirect('/')->with('message', 'Familie verwijderd');
    }

    // Relationship to familieleden
    public function familierelatie($id)
    {
        $familie = Familie::findOrFail($id);
        $familieleden = $familie->familieleden()->get();
        return view('components.familie-kaart', compact('familie', 'familieleden'));
    }



}