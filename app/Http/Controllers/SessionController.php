<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(){
        $validated = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' =>'required|min:6'
        ]);
        if(! auth()->attempt($validated)){
            throw ValidationValidationException::withMessages([
                'email' => 'Your provided cridentials not varified'
            ]);
            // return back()->withErrors(['email' => 'Your provided cridentials not varified!']);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');



    }
    public function destroy(){
        Auth::logout();
        return redirect('/')->with('success', 'GodBye!');
    }

}
