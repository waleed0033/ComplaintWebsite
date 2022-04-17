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
            'g-recaptcha-response' => ['required','captcha']
        ],
        [
            'g-recaptcha-response.required' => 'please press I\'m not a robot',
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->only('remember')))
        {
            return back()->withErrors(['msg'=>'Email or Password are not correct']);
        }

        return redirect()->route('home');
    }

    public function destroy(Request $request)
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
