<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use App\Models\Familieleden;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FamilieController extends Controller
{
    // Show all Families

    public function index()
    {
        //dd(request('lastname'));
        return view('families.index', [
            'families' => Familie::latest()->filter(request(['search']))->paginate(2)
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
            'lastname' => ['required', Rule::unique('families', 'lastname')],
            'address' => 'required'
        ]);

        Familie::create($formFields);

        return redirect('/')->with('message', 'Nieuwe Familie aangemaakt');
    }


}