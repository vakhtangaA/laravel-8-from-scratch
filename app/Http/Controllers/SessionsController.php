<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        // auth()->logout();
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
