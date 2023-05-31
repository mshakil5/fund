<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\TicketSale;
use App\Models\User;
use Mail;
use App\Models\EmailContent;
use App\Mail\ContactFormMail;
use App\Models\ContactMail;
use App\Models\EventTransaction;
use Illuminate\support\Facades\Auth;

class EventController extends Controller
{
    public function getEvent()
    {
        $data = Event::orderby('id','DESC')->get();
        $users = User::select('id','name','email')->where('is_type','0')->get();
        return view('admin.event.index',compact('data','users'));
    }

    public function start_new_event()
    {
        return view('frontend.event.index');
    }

    public function getEventByUser()
    {
        $data = Event::where('user_id', Auth::user()->id)->orderby('id','DESC')->get();
        return view('user.event.index',compact('data'));
    }

    public function getEventDocByUser()
    {
        $event = Event::where('user_id', Auth::user()->id)->orderby('id','DESC')->get();
        $data = TicketSale::where('user_id', Auth::user()->id)->get();
        return view('user.event.document',compact('data','event'));
    }

    public function viewEventByAdmin($id)
    {
        $data = Event::with('eventimage')->where('id', $id)->first();
        
        $transaction = EventTransaction::where('event_id', $id)->orderby('id','DESC')->get();
        $totalInAmount = EventTransaction::where('event_id', $id)->where('tran_type','In')->sum('amount');
        $totalOutAmount = EventTransaction::where('event_id', $id)->where('tran_type','Out')->sum('amount');
        
        return view('admin.event.view',compact('data','transaction','totalInAmount','totalOutAmount'));
        
    }

    public function eventTicketSaleShowByUser($id)
    {
        $data = Event::with('eventimage','eventticket')->where('id', $id)->first();
        return view('user.event.saleslist',compact('data'));
    }

    public function eventCreateByUser(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Title \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->organizer)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Organizer \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->tagline)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Tagline \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->venue_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Venue Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->category)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Category \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->event_type)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Event Type \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->house_number)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"House Number \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->road_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Road Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->town)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Town \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->postcode)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Postcode \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->quantity)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Quantity \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        // if(empty($request->price)){
        //     $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Price \" field..!</b></div>";
        //     return response()->json(['status'=> 303,'message'=>$message]);
        //     exit();
        // }

        $data = new Event();
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->organizer = $request->organizer;
        $data->tagline = $request->tagline;
        $data->venue_name = $request->venue_name;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->house_number = $request->house_number;
        $data->road_name = $request->road_name;
        $data->country = $request->country;
        $data->town = $request->town;
        $data->postcode = $request->postcode;
        $data->quantity = $request->quantity;
        $data->available = $request->quantity;
        $data->event_start_date = $request->event_start_date;
        $data->event_end_date = $request->event_end_date;
        $data->price = $request->price;
        if($request->price>0){
        $data->is_free = 0;
        }else{
        $data->is_free = 1;    
        }
        $data->sale_end_date = $request->sale_end_date;
        $data->sale_start_date = $request->sale_start_date;
        $data->summery = $request->summery;
        $data->description = $request->description;

        if($request->fimage != 'null'){
            $request->validate([
                'fimage' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->fimage->extension();
            $request->fimage->move(public_path('images/event'), $imageName);
            $data->image= $imageName;
        }
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            //image upload start
            if ($request->image) {
                // $media= [];
                foreach ($request->image as $img) {
                    
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$img->extension();
                    $img->move(public_path('images/event'), $imageName);
                    //insert into picture table
                    $pic = new EventImage();
                    $pic->image = $imageName;
                    $pic->title = "Slider";
                    $pic->user_id = Auth::user()->id;
                    $pic->event_id = $data->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
            }
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New event create successfully.</b></div>";
            // $message = $request->image[0];
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function eventEditByUser($id)
    {
        $data = Event::with('eventimage')->where('id', $id)->first();
        return view('user.event.edit',compact('data'));
    }

    public function eventUpdateByUser(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Title \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->organizer)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Organizer \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->tagline)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Tagline \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->venue_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Venue Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->category)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Category \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->event_type)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Event Type \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->house_number)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"House Number \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->road_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Road Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->town)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Town \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->postcode)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Postcode \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->quantity)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Quantity \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->price)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Price \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = Event::find($request->event_id);
        $data->title = $request->title;
        $data->organizer = $request->organizer;
        $data->tagline = $request->tagline;
        $data->venue_name = $request->venue_name;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->house_number = $request->house_number;
        $data->road_name = $request->road_name;
        $data->country = $request->country;
        $data->town = $request->town;
        $data->postcode = $request->postcode;
        $data->quantity = $request->quantity;
        $data->available = $request->quantity;
        $data->event_start_date = $request->event_start_date;
        $data->event_end_date = $request->event_end_date;
        $data->price = $request->price;
        $data->sale_end_date = $request->sale_end_date;
        $data->sale_start_date = $request->sale_start_date;
        $data->summery = $request->summery;
        $data->description = $request->description;

        if($request->fimage != 'null'){
            $request->validate([
                'fimage' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->fimage->extension();
            $request->fimage->move(public_path('images/event'), $imageName);
            $data->image= $imageName;
        }
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            //image upload start
            if ($request->image) {
                // $media= [];
                foreach ($request->image as $img) {
                    
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$img->extension();
                    $img->move(public_path('images/event'), $imageName);
                    //insert into picture table
                    $pic = new EventImage();
                    $pic->image = $imageName;
                    $pic->title = "Slider";
                    $pic->user_id = Auth::user()->id;
                    $pic->event_id = $data->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
            }
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Event updated successfully.</b></div>";
            // $message = $request->image[0];
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }



    public function storeEventByAdmin(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Title \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->organizer)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Organizer \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->tagline)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Tagline \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->venue_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Venue Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->category)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Category \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->event_type)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Event Type \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->house_number)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"House Number \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->road_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Road Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->town)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Town \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->postcode)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Postcode \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->quantity)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Quantity \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->price)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Price \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = new Event();
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->organizer = $request->organizer;
        $data->tagline = $request->tagline;
        $data->venue_name = $request->venue_name;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->house_number = $request->house_number;
        $data->road_name = $request->road_name;
        $data->country = $request->country;
        $data->town = $request->town;
        $data->postcode = $request->postcode;
        $data->quantity = $request->quantity;
        $data->available = $request->quantity;
        $data->event_start_date = $request->event_start_date;
        $data->event_end_date = $request->event_end_date;
        $data->price = $request->price;
        $data->sale_end_date = $request->sale_end_date;
        $data->sale_start_date = $request->sale_start_date;
        $data->summery = $request->summery;
        $data->description = $request->description;

        if($request->fimage != 'null'){
            $request->validate([
                'fimage' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->fimage->extension();
            $request->fimage->move(public_path('images/event'), $imageName);
            $data->image= $imageName;
        }
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            //image upload start
            if ($request->image) {
                // $media= [];
                foreach ($request->image as $img) {
                    
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$img->extension();
                    $img->move(public_path('images/event'), $imageName);
                    //insert into picture table
                    $pic = new EventImage();
                    $pic->image = $imageName;
                    $pic->title = "Slider";
                    $pic->user_id = Auth::user()->id;
                    $pic->event_id = $data->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
            }
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New event create successfully.</b></div>";
            // $message = $request->image[0];
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function activeEvent(Request $request)
    {
        $event = Event::where('id',$request->id)->first();
        $eventuser = User::where('id', $event->user_id)->first();
        $data = Event::find($request->id);
        $data->status = $request->status;
        $data->save();
        if($request->status==1){
            $active = Event::find($request->id);
            $active->status = $request->status;
            $active->save();

            $adminmail = ContactMail::where('id', 1)->first()->email;
            $contactmail = $eventuser->email;
            $ccEmails = [$adminmail];
            $msg = EmailContent::where('title','=','event_active_email')->first()->description;
            
            $array['name'] = $eventuser->name;
            $array['email'] = $eventuser->email;
            $array['subject'] = "Your event active successfully";
            $array['message'] = $msg;
            $array['contactmail'] = $contactmail;
            Mail::to($contactmail)
                ->cc($ccEmails)
                ->send(new ContactFormMail($array));


            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Active Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            $deactive = Event::find($request->id);
            $deactive->status = $request->status;
            $deactive->save();
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Inactive Successfully.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }
    }

    public function editEventByAdmin($id)
    {
        $data = Event::with('eventimage')->where('id', $id)->first();
        // dd($data);
        return view('admin.event.edit',compact('data'));
        
    }

    public function updateEventByAdmin(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Title \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->organizer)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Organizer \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->tagline)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Tagline \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->venue_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Venue Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->category)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Category \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->event_type)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Event Type \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->house_number)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"House Number \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->road_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Road Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->town)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Town \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->postcode)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Postcode \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->quantity)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Quantity \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        if(empty($request->price)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Price \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = Event::find($request->codeid);
        $data->title = $request->title;
        $data->organizer = $request->organizer;
        $data->tagline = $request->tagline;
        $data->venue_name = $request->venue_name;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->house_number = $request->house_number;
        $data->road_name = $request->road_name;
        $data->country = $request->country;
        $data->town = $request->town;
        $data->postcode = $request->postcode;
        $data->quantity = $request->quantity;
        $data->available = $request->quantity;
        $data->event_start_date = $request->event_start_date;
        $data->event_end_date = $request->event_end_date;
        $data->price = $request->price;
        $data->sale_end_date = $request->sale_end_date;
        $data->sale_start_date = $request->sale_start_date;
        $data->summery = $request->summery;
        $data->description = $request->description;

        if($request->fimage != 'null'){
            $request->validate([
                'fimage' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->fimage->extension();
            $request->fimage->move(public_path('images/event'), $imageName);
            $data->image= $imageName;
        }
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            //image upload start
            if ($request->image) {
                // $media= [];
                foreach ($request->image as $img) {
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$img->extension();
                    $img->move(public_path('images/event'), $imageName);
                    //insert into picture table
                    $pic = new EventImage();
                    $pic->image = $imageName;
                    $pic->title = "Slider";
                    $pic->user_id = Auth::user()->id;
                    $pic->event_id = $data->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
            }
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New event updated successfully.</b></div>";
            // $message = $request->image[0];
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    //  free event ticket booked by Fahim 

    public function freeEventbooked(Request $request)
    {
    $evnbooked = new TicketSale();
    $evnbooked->date = date('Y-m-d');
    $evnbooked->tran_no = date('his');
    $evnbooked->user_id = Auth::user()->id;
    $evnbooked->event_id = $request->event_id;
    $evnbooked->commission = 00;
    $evnbooked->amount = 00;
    $evnbooked->total_amount = 00;
    $evnbooked->quantity = $request->quantity;
    $evnbooked->payment_type = "Free";
    $evnbooked->note = $request->note;
    $evnbooked->user_notification = "0";
    $evnbooked->admin_notification = "0";
    $evnbooked->status = "0";
    $evnbooked->save();

    $event = Event::find($request->event_id);
    $event->available = $event->available-$request->quantity;
    $event->sold = $event->sold+$request->quantity;
    $event->save();

    $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Event booked successfully.</b></div>";
    // $message = $request->image[0];
    return response()->json(['status'=> 300,'message'=>$message]);

    }


}
