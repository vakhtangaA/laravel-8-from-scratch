<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        # TODO
        # If you are returning only views, 
        # You can do this from the routes file like this:
        # Route::view('route', 'admin.posts.create');
        # @see https://laravel.com/docs/8.x/routing#view-routes
        return view('register.create');
    }

    public function store()
    {
        # TODO 
        # validation logic should be extracted
        # Into custom request
        # @see https://laravel.com/docs/8.x/validation#form-request-validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7',
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        session()->flash('success', 'Your account has been created');

        return redirect('/');
    }
}
