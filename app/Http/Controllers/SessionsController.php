<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'logged out successefully');
    }
    public function create()
    {
        return view('sessions.login');
    }
    public function store()
    {
        $credintials = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($credintials)) {
            return redirect('/')->with(['succsess', 'you are logged in successefully']);
        }
        throw ValidationException::withMessages([
            'email' => 'your email is not right'
        ]);
    }
}