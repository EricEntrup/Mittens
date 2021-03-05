<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    function chartMorris(){
        $assets = ['morrischart'];
        return view('Charts.chart-morris',compact('assets'));
    }

    function chartHigh(){
        $assets = ['highchart'];
        return view('Charts.chart-high',compact('assets'));

    }
    
    function chartAm(){
        $assets = ['amchartchart'];
        return view('Charts.chart-am',compact('assets'));

    }

    function chartApex(){
        $assets = ['apexchart'];
        return view('Charts.chart-apex',compact('assets'));

    }
}
