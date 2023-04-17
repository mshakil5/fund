<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\FundraisingSource;
use App\Models\Campaign;
use Illuminate\support\Facades\Auth;

class CampaignController extends Controller
{
    public function newCampaign()
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();
        return view('user.new_fundraiser',compact('country','source'));
    }

    public function newCampaignStore(Request $request)
    {

        if(empty($request->country)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Country \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->source)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Why you are fundrising \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->title)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Title \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->story)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Story \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->video_link)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Video Link \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->raising_goal)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Goal \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        



        $data = new Campaign();
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->story = $request->story;
        $data->video_link = $request->video_link;
        $data->raising_goal = $request->raising_goal;
        $data->fundraising_source_id = $request->source;
        $data->country_id = $request->country;
        $data->fundraising_for = "yourself";
        // image
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data->image= $imageName;
        }
        // end
        $data->status = "0";
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New campaign create successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }
}
