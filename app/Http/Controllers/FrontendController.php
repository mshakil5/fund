<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function work()
    {
        return view('frontend.work');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function nonprofit()
    {
        return view('frontend.nonprofit');
    }

    public function individual()
    {
        return view('frontend.individual');
    }

    public function fundriser()
    {
        return view('frontend.fundriser');
    }
}
