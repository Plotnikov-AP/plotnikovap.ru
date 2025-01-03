<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    Public function main() {                         
        // CounterController::setAllCount();            
        // $sliders = Slider::orderBy('id')->get();     
        return view('main');
    }     
}