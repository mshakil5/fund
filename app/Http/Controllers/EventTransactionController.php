<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventTransaction;
use App\Models\Event;
use App\Models\User;
use App\Models\EventWithdrawReq;
use Illuminate\support\Facades\Auth;

class EventTransactionController extends Controller
{
    public function getEventTran($id)
    {
        $user_id = Event::where('id', $id)->first()->user_id;
        
        if ($user_id == Auth::user()->id) {
            $data = EventTransaction::where('event_id', $id)->orderby('id','DESC')->get();
            $totalInAmount = EventTransaction::where('event_id', $id)->where('tran_type','In')->sum('amount');
            $totalOutAmount = EventTransaction::where('event_id', $id)->where('tran_type','Out')->sum('amount');
            // dd($data);
            $withdrawreqs = EventWithdrawReq::where('event_id', $id)->orderby('id','DESC')->get();
            return view('user.event.transaction',compact('data','totalInAmount','totalOutAmount','withdrawreqs'));
        } else {
            return view('error.404');
        }
        
        
    }

    public function getEventTranByAdmin($id)
    {
        
        $data = EventTransaction::where('event_id', $id)->orderby('id','DESC')->get();
        $totalInAmount = EventTransaction::where('event_id', $id)->where('tran_type','In')->sum('amount');
        $totalOutAmount = EventTransaction::where('event_id', $id)->where('tran_type','Out')->sum('amount');
        // dd($data);
        $withdrawreqs = EventWithdrawReq::where('event_id', $id)->orderby('id','DESC')->get();
        return view('admin.event.transaction',compact('data','totalInAmount','totalOutAmount','withdrawreqs'));
        
    }
}
