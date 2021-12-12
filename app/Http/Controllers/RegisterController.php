<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
	public function store(RegisterUserRequest $request)
	{
		$user = new User;

		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = $request->password;

		$user->save();

		Auth::login($user);

		session()->flash('success', 'Your account has been created');

		return redirect()->route('name');
	}
}
