<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Registration Create Form
    public function create()
    {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed | min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user = User::create($formFields);

        //Login 
        auth()->login($user);

        return redirect('/')->with('message', 'Nieuwe gebruiker aangemaakt en ingelogd');
    }

    // Show Edit User  Form
    public function edit(User $user)
    {
        //dd($user->name);
        return view('users.edit', ['user' => $user]);
    }

    //Update User Data
    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable| confirmed | min:6'
        ]);

        // Hash Password
        if (
            empty($formFields['password'])
        ) {
            unset($formFields['password']);
        } else {
            $formFields['password'] = bcrypt($formFields['password']);

        }


        $user->update($formFields);

        return back()->with('message', 'User bewerking succesvol');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'U bent uitgelogd');
    }

    //Show Login Form

    public function login()
    {
        return view('users.login');
    }

    // Authenticate User

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'U bent ingelogd');
        }

        return back()->withErrors(['email' => 'Ongeldige inlog gegevens'])->onlyInput('email');
    }

}