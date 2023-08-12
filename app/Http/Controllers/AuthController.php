<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{

    public function postLogin(Request $request)
    {
        $request->validate(
            [
            'username' => 'required',
            'password' => 'required',
            ]
        );

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/system')
                ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("/user-login")->withSuccess('Opps! Invalid Username or Password');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('/user-login');
    }
}
