<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    function googleMap(){
        return view('Maps.google-map');
    }
    function vectorMap(){
        return view('Maps.vector-map');

    }
}
