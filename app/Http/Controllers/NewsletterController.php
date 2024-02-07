<?php

namespace App\Http\Controllers;

use App\Services\MailChimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email'=>'required|email']);
        try{
            $newsletter->subscribe(request('email'));

        }catch(\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This eamil could not be added.'
            ]);
        }
        return redirect('/')->with('success', 'You are signed up for newsletter!');
    }
}
