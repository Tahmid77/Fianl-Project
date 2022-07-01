<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function users()
    {

        $user = User::where("type", "user")->get();

        return view("adminOperations.user", ['users' => $user]);
    }

    public function deleteUser($id)
    {

        $user = User::find($id);
        $user->delete();
        Session::flash('msg', 'User Deleted');


        return redirect('/adminOperations/user');
    }
}
