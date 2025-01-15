<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;


class MainController extends Controller
{
    public function main() {                         
        CounterController::setAllCount();            
        return view('main');
    }

    public function pyatnashki() {
        return view('pyatnashki');
    }

    public function contacts() {
        return view('contacts');
    }

    public function languageSwitch(Request $request) {
        //get the language from the form
        $language=$request->input(key:'language');
        //store the language in the session
        Session(['language'=>$language]);
        //return on page
        return redirect()->back();
    }

    public function pageInWork() {
        return view('my-page-in-work');
    }
}