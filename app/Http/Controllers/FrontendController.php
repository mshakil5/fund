<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $campaign = Campaign::where('status','1')->orderby('id','DESC')->get();
        return view('frontend.index',compact('campaign'));
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

    public function campaignDetails($id)
    {
        $campaign = Campaign::where('id','!=',$id)->whereStatus(1)->orderby('id','DESC')->get();
        $data = Campaign::where('id',$id)->first();
        return view('frontend.campaigndetails', compact('data','campaign'));
    }
}
