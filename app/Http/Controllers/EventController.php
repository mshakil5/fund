<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\User;
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
        $users = User::select('id','name','email')->where('is_type','0')->get();
        return view('user.event.index',compact('data','users'));
    }

    public function eventCreateByUser(Request $request)
    {
        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Title \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = new Event();
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->tagline = $request->tagline;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->location = $request->location;
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

        $data = Event::find($request->event_id);
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->tagline = $request->tagline;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->location = $request->location;
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

        $data = new Event();
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->tagline = $request->tagline;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->location = $request->location;
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
        $data = Event::find($request->id);
        $data->status = $request->status;
        $data->save();
        if($request->status==1){
            $active = Event::find($request->id);
            $active->status = $request->status;
            $active->save();
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

        $data = Event::find($request->codeid);
        $data->title = $request->title;
        $data->tagline = $request->tagline;
        $data->category = $request->category;
        $data->event_type = $request->event_type;
        $data->location = $request->location;
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
}
