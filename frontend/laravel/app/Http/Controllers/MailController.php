<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    function mail(){
        return view('Mail.inbox');
    }
    function composeMail(){
        return view('Mail.compose');

    }
}
