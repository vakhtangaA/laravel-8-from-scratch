<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        # TODO 
        # validation logic should be extracted
        # Into custom request
        # @see https://laravel.com/docs/8.x/validation#form-request-validation
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $c) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list'
            ]);
        } # TODO: remove 2 blank lines below



        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
