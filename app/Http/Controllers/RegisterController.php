<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $att = request()->validate([
            'name' => 'required|min:3|max:255',
            'user_name' => 'required|min:3|max:255|unique:users,user_name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|max:255',
        ]);

        $user = User::create($att);

        Auth::login($user);
        return redirect('/')->with('success', 'Your account has been created.');;
    }


}
