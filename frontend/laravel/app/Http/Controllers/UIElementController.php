<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UIElementController extends Controller
{
    //
    function color(){
        return view('UIElements.color');
    }
    function typography(){
        return view('UIElements.typography');
    }
    function alert(){
        return view('UIElements.alert');
    }
    function badges(){
        return view('UIElements.badge');
    }
    function breadCrumb(){
        return view('UIElements.breadcrumb');
    }
    function button(){
        return view('UIElements.button');
    }
    function card(){
        return view('UIElements.card');
    }
    function carousel(){
        return view('UIElements.carousel');
    }
    function video(){
        return view('UIElements.video');
    }
    function grid(){
        return view('UIElements.grid');
    }
    function images(){
        return view('UIElements.images');
    }
    function listGroup(){
        return view('UIElements.listGroup');
    }
    function medai(){
        return view('UIElements.media');
    }
    function modal(){
        return view('UIElements.modal');
    }
    function notifications(){
        return view('UIElements.notifications');
    }
    function pagination(){
        return view('UIElements.pagination');
    }
    function popovers(){
        return view('UIElements.popovers');
    }
    function progressbars(){
        return view('UIElements.progressbars');
    }
    function tabs(){
        return view('UIElements.tabs');
    }
    function tooltips(){
        return view('UIElements.tooltips');
    }

}
