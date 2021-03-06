<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscibeNewsLetterRequest;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
	public function __invoke(Newsletter $newsletter, SubscibeNewsLetterRequest $request)
	{
		try
		{
			$newsletter->subscribe($request['email']);
		}
		catch (\Exception $c)
		{
			throw ValidationException::withMessages([
				'email' => 'This email could not be added to our newsletter list',
			]);
		}

		return redirect()->route('home')->with('success', 'You are now signed up for our newsletter!');
	}
}
