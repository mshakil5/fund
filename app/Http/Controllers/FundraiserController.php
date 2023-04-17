<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\FundraisingSource;
use App\Models\Campaign;
use Illuminate\support\Facades\Auth;

class FundraiserController extends Controller
{
    public function activeCampaign()
    {
        $data = Campaign::where('user_id', Auth::user()->id)->get();
        return view('user.activecampaign', compact('data'));
    }

}
