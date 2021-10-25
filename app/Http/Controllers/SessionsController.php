<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create()
    {
        # TODO
        # If you are returning only views, 
        # You can do this from the routes file like this:
        # Route::view('route', 'view');
        # @see https://laravel.com/docs/8.x/routing#view-routes
        return view('sessions.create');
    }

    public function store()
    {
        # TODO 
        # validation logic should be extracted
        # Into custom request
        # @see https://laravel.com/docs/8.x/validation#form-request-validation
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]); # TODO: remove blank line below


        if (Auth::attempt($attributes)) {

            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
