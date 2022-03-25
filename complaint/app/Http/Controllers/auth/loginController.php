<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required','email','min:6','max:255'],
            'password' => ['required'],
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->only('remember')))
        {
            return back()->withErrors(['msg'=>'Email or Password are not correct']);
        }

        return redirect()->route('home');
    }
}
