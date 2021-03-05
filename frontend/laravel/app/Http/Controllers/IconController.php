<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconController extends Controller
{
    function dripicons(){
        return view('Icons.icon-dripicons');
    }
    function fontAwesome(){
        return view('Icons.icon-fontawesome');

    }
    function lineAwesome(){
        return view('Icons.icon-lineawesome');

    }
    function remixicon(){
        return view('Icons.icon-remixicon');

    }
    function unicons(){
        return view('Icons.icon-unicons');

    }
}
