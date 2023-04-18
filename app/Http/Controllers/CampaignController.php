<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\FundraisingSource;
use App\Models\Campaign;
use App\Models\CampaignImage;
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
        if ($request->image) {
            foreach ($request->image as $key => $image) {
                if ($key == 0) {
                    $rand = mt_rand(100000, 999999);
                    $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                    //move image to postimages folder
                    $image->move(public_path() . '/images/', $name);
                    //insert into picture table
                    $data->image = $name;
                }
            }
        }
        // end
        $data->status = "0";
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            //image upload start
            if ($request->image) {
                // $media= [];
                foreach ($request->image as $image) {
                    $rand = mt_rand(100000, 999999);
                    $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                    //move image to postimages folder
                    $image->move(public_path() . '/images/', $name);
                    //insert into picture table
                    $pic = new CampaignImage();
                    $pic->image = $name;
                    $pic->campaign_id = $data->id;
                    $pic->user_id = Auth::user()->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
            }
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New campaign create successfully.</b></div>";
            // $message = $request->image[0];
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    // campaign by admin
    public function getCampaignByAdmin()
    {
        $countries = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();
        $data = Campaign::orderby('id','DESC')->get();
        return view('admin.campaign.index',compact('countries','source','data'));
    }

    // campaign store by admin
    public function storeCampaignByAdmin(Request $request)
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
        $data->fundraising_for = $request->fundraising_for;
        // image
        // if ($request->image) {
        //     foreach ($request->image as $key => $image) {
        //         if ($key == 0) {
        //             $rand = mt_rand(100000, 999999);
        //             $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
        //             //move image to postimages folder
        //             $image->move(public_path() . '/images/', $name);
        //             //insert into picture table
        //             $data->image = $name;
        //         }
        //     }
        // }
        // end
        $data->status = "0";
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            //image upload start
            if ($request->image) {
                // $media= [];
                foreach ($request->image as $image) {
                    $rand = mt_rand(100000, 999999);
                    $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                    //move image to postimages folder
                    $image->move(public_path() . '/images/', $name);
                    //insert into picture table
                    $pic = new CampaignImage();
                    $pic->image = $name;
                    $pic->campaign_id = $data->id;
                    $pic->user_id = Auth::user()->id;
                    $pic->created_by = Auth::user()->id;
                    $pic->save();
                }
            }
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>New campaign create successfully.</b></div>";
            // $message = $request->image[0];
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function deleteCampaignByAdmin($id)
    {
        if(Campaign::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Campaign has been deleted successfully']);
        }else{
            return response()->json(['success'=>false,'message'=>'Delete Failed']);
        }
    }

    public function activeCampaign(Request $request)
    {
        $data = Campaign::find($request->id);
        $data->status = $request->status;
        $data->save();

        if($request->status==1){
            $active = Campaign::find($request->id);
            $active->status = $request->status;
            $active->save();
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Active Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            $deactive = Campaign::find($request->id);
            $deactive->status = $request->status;
            $deactive->save();
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Inactive Successfully.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }

    }
}
