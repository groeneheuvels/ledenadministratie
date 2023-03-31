<?php

namespace App\Http\Controllers;

use App\Models\Familie;

class FamilieController extends Controller
{
    // Show all Families

    public function index()
    {
        return view('families.index', [
            'families' => Familie::latest()->paginate(6)
        ]);
    }
}