<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraPagesController extends Controller
{
    function timeline(){
        return view('ExtraPages.timeline-page');
    }
    function invoice(){
        return view('ExtraPages.invoice-page');
    }
    function blankPages(){
        return view('ExtraPages.blank-page');
    }
    function error404(){
    return view('ExtraPages.error-404');
    }
    function error500(){
        return view('ExtraPages.error-500');
    }
    function pricing(){
        return view('ExtraPages.pricing-page');
    }
    function pricingOne(){
        return view('ExtraPages.pricing-one-page');
    }
    function maintenance(){
        return view('ExtraPages.maintenance-page');
    }
    function commingSoon(){
        return view('ExtraPages.commingsoon-page');
    }
    function faq(){
        return view('ExtraPages.faq-page');
    }
}
