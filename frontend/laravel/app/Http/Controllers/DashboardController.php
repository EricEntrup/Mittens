<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $assets = ['apexchart'];
        return view('dashboard.index',compact('assets'));
    }

    public function index2(){
        $assets = ['apexchart'];
        return view('dashboard.index-2',compact('assets'));
    }
   
}
