<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;




class NewsLetterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {

        request()->validate([
            'emails' => ['required', 'email']
        ]);
        try {
            $newsletter->subscribe(request('emails'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'emails' => 'this Email is not valid please try another one'
            ]);
        }
        return redirect('/')->with('success', 'Congratulation for subscribtion !');
    }
}