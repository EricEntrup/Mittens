<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function login(){
        return view('Authentication.login');
    }
    function registration(){
        return view('Authentication.registration');

    }
    function recoverPassword(){
        return view('Authentication.recover-password');

    }
    function confirmEmail(){
        return view('Authentication.confirm-email');

    }
    function lockScreen(){
        return view('Authentication.lock-screen');

    }
}
