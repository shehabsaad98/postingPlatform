<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Inflector\Rules\French\Rules;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $userAttributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:200']
        ]);
        $user = User::create($userAttributes);
        auth()->login($user);
        // session()->flash('success', 'your account is created yazmely');
        return redirect('/')->with('success', 'Awesome ! your account is created ');

    }
}