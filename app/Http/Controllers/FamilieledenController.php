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
    public function create()
    {
        return view('familieleden.create');
    }


}