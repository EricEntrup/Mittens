<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    function index(){
        return view('Calendar.calendar');
    }
    function chat(){
        return view('Chat.chat');
    }
    function todo(){
        return view('Todo.todo-list');
    }
}
