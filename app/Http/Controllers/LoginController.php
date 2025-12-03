<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login'); 
    }
    public function showRegForm()
    {
        return view('login.register');
    }
}
