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
        $eventdtl = Event::where('id', $id)->first();
        
        if ($eventdtl->user_id == Auth::user()->id) {
            $data = EventTransaction::where('event_id', $id)->orderby('id','DESC')->get();
            $totalInAmount = EventTransaction::where('event_id', $id)->where('tran_type','In')->sum('amount');
            $totalOutAmount = EventTransaction::where('event_id', $id)->where('tran_type','Out')->sum('amount');
            // dd($data);
            $withdrawreqs = EventWithdrawReq::where('event_id', $id)->orderby('id','DESC')->get();
            return view('user.event.transaction',compact('data','totalInAmount','totalOutAmount','withdrawreqs','eventdtl'));
        } else {
            return view('error.404');
        }
        
        
    }

    public function getEventTranByAdmin($id)
    {
        
        $event = Event::where('id', $id)->first();
        $user = User::where('id', $event->user_id)->first();
        $data = EventTransaction::where('event_id', $id)->orderby('id','DESC')->get();
        $totalInAmount = EventTransaction::where('event_id', $id)->where('tran_type','In')->sum('amount');
        $totalOutAmount = EventTransaction::where('event_id', $id)->where('tran_type','Out')->sum('amount');
        // dd($data);
        $withdrawreqs = EventWithdrawReq::where('event_id', $id)->orderby('id','DESC')->get();
        return view('admin.event.transaction',compact('data','totalInAmount','totalOutAmount','withdrawreqs','event','user'));
        
    }

    public function eventPayStore(Request $request)
    {
        
            $t_id = time() . "-" . $request->event_id;
            $transaction = new EventTransaction();
            $transaction->date = date('Y-m-d');
            $transaction->tran_no = $t_id;
            $transaction->user_id = $request->user_id;
            $transaction->event_id = $request->event_id;
            $transaction->tran_type = "Out";
            $transaction->name = $request->source;
            $transaction->amount = $request->amount;
            $transaction->description = $request->description;
            $transaction->status = "1";
            $transaction->save();

            $message ="Amount pay Successfully. Transaction id is: ". $t_id;
            return back()->with('message', $message);

        return back();
    }
}
