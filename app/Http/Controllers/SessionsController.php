<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCredentialsRequest;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
	public function destroy()
	{
		Auth::logout();

		return redirect()->route('home')->with('success', 'Goodbye!');
	}

	public function store(StoreUserCredentialsRequest $request)
	{
		$attributes['email'] = $request->email;
		$attributes['password'] = $request->password;

		if (Auth::attempt($attributes))
		{
			return redirect()->route('home')->with('success', 'Welcome Back!');
		}

		return back()
			->withInput()
			->withErrors(['email' => 'Your provided credentials could not be verified.']);
	}
}
