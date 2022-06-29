<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //show register form

    public function create()
    {
        return view('users.register');
    }

    public function store(Request $req)
    {
        $formVal = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        $formVal['password'] = bcrypt($formVal['password']);
        $user = User::create($formVal);

        auth()->login($user);
        Session::flash('msg', 'Registered Successfully');
        return redirect('/');
    }

    public function login(Request $req)
    {
        return view('users.login');
    }

    public function logout(Request $req)
    {
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        Session::flash('msg', 'Logged Out Successfully');
        return redirect('/');
    }

    public function authenticate(Request $req)
    {
        $formVal = $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($formVal)) {
            $req->session()->regenerate();

            Session::flash('msg', 'Logged in Successfully');
            return redirect('/');
        } else {


            Session::flash('msg', 'Invalid Credentials');
            return back();
        }
    }
}