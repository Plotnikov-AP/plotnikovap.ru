<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function main() {                         
        // CounterController::setAllCount();            
        // $sliders = Slider::orderBy('id')->get();     
        return view('main');
    } 

    public function languageSwitch(Request $request) {
        //get the language from the form
        $language=$request->input(key:'language');
        //store the language in the session
        Session(['language'=>$language]);
        //return on page
        return redirect()->back();
    }
}