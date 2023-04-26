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

    // frontpage new campaign 
    public function startCampaign()
    {
        return view('frontend.start_new_campaign');
    }

    // public function startCampaignGeneralInfo()
    // {
    //     $country = Country::select('id','name')->get();
    //     $source = FundraisingSource::select('id','name')->get();
        
    //     return view('frontend.campaign_info',compact('country','source'));
    // }

    public function startCampaignGeneralInformation(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();
        $funraisingtype = $request->fund_raising_type;
        // dd($funraisingtype);
        return view('frontend.start_new_campaign_geninfo',compact('country','source','funraisingtype'));
    }

    public function startCampaignBasicInformation(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();
        $fund_raising_type = $request->fund_raising_type;
        $countryid = $request->country;
        $sourceid = $request->source;
        $title = $request->title;
        $story = $request->story;
        // dd($fund_raising_type);
        return view('frontend.start_new_campaign_basicinfo',compact('country','source','countryid','sourceid','title','story','fund_raising_type'));
    }

    public function startCampaignPersonalInformation(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();
        $fund_raising_type = $request->fund_raising_type;
        $countryid = $request->countryid;
        $sourceid = $request->sourceid;
        $title = $request->title;
        $story = $request->story;
        $raising_goal = $request->raising_goal;
        $image = $request->image;
        $video_link = $request->video_link;
        $tagline = $request->tagline;
        $category = $request->category;
        $location = $request->location;
        $funding_type = $request->funding_type;
        $end_date = $request->end_date;
        // dd($image);
        return view('frontend.start_new_campaign_personalinfo',compact('country','source','countryid','sourceid','title','story','fund_raising_type','raising_goal','image','video_link','tagline','category','location','funding_type','end_date'));
    }

    public function startCampaignBankInformation(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();
        $fund_raising_type = $request->fund_raising_type;
        $countryid = $request->countryid;
        $sourceid = $request->sourceid;
        $title = $request->title;
        $story = $request->story;
        $raising_goal = $request->raising_goal;
        $image = $request->image;
        $video_link = $request->video_link;
        $tagline = $request->tagline;
        $category = $request->category;
        $location = $request->location;
        $funding_type = $request->funding_type;
        $end_date = $request->end_date;

        $email = $request->email;
        $name = $request->name;
        $family_name = $request->family_name;
        $dob = $request->dob;
        $phone = $request->phone;
        $country_address = $request->country_address;
        $address = $request->address;
        $city = $request->city;
        $street_name = $request->street_name;
        $town = $request->town;
        $postcode = $request->postcode;
        $gov_issue_id = $request->gov_issue_id;
        
        // dd($image);


        return view('frontend.start_new_campaign_bankinfo',compact('country','source','countryid','sourceid','title','story','fund_raising_type','raising_goal','image','video_link','tagline','category','location','funding_type','end_date','email','name','family_name','dob','phone','country_address','address','city','street_name','town','postcode','gov_issue_id'));
    }

    public function startCampaignTermsCondition(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();

        $fund_raising_type = $request->fund_raising_type;
        $countryid = $request->countryid;
        $sourceid = $request->sourceid;
        $title = $request->title;
        $story = $request->story;
        $raising_goal = $request->raising_goal;
        $image = $request->image;
        $video_link = $request->video_link;
        $tagline = $request->tagline;
        $category = $request->category;
        $location = $request->location;
        $funding_type = $request->funding_type;
        $end_date = $request->end_date;
        $email = $request->email;
        $name = $request->name;
        $family_name = $request->family_name;
        $dob = $request->dob;
        $phone = $request->phone;
        $country_address = $request->country_address;
        $address = $request->address;
        $city = $request->city;
        $street_name = $request->street_name;
        $town = $request->town;
        $postcode = $request->postcode;
        $gov_issue_id = $request->gov_issue_id;
        $currency = $request->currency;
        $name_of_account = $request->name_of_account;
        $bank_account_country = $request->bank_account_country;
        $bank_name = $request->bank_name;
        $bank_account_class = $request->bank_account_class;
        $bank_account_type = $request->bank_account_type;
        $bank_routing = $request->bank_routing;
        $iban = $request->iban;
        $bank_verification_doc = $request->bank_verification_doc;
        // dd($countryname);
        return view('frontend.start_new_campaign_terms',compact('country','source','countryid','sourceid','title','story','fund_raising_type','raising_goal','image','video_link','tagline','category','location','funding_type','end_date','email','name','family_name','dob','phone','country_address','address','city','street_name','town','postcode','gov_issue_id','currency','name_of_account','bank_account_country','bank_name','bank_account_class','bank_account_type','bank_routing','iban','bank_verification_doc'));
    }

    public function startCampaignconfirmation(Request $request)
    {
        $data = new Campaign;
        $data->fund_raising_type = $request->fund_raising_type;
        if (Auth::user()) {
            $data->user_id = Auth::user()->id;
        }
        $data->country_id = $request->countryid;
        $data->fundraising_source_id = $request->sourceid;
        $data->title = $request->title;
        $data->story = $request->story;
        $data->raising_goal = $request->raising_goal;
        // $data->image = $request->image;
        $data->video_link = $request->video_link;
        $data->tagline = $request->tagline;
        $data->category = $request->category;
        $data->location = $request->location;
        $data->funding_type = $request->funding_type;
        $data->end_date = $request->end_date;
        $data->email = $request->email;
        $data->name = $request->name;
        $data->family_name = $request->family_name;
        $data->dob = $request->dob;
        $data->phone = $request->phone;
        $data->country_address = $request->country_address;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->street_name = $request->street_name;
        $data->town = $request->town;
        $data->postcode = $request->postcode;
        $data->gov_issue_id = $request->gov_issue_id;
        $data->currency = $request->currency;
        $data->name_of_account = $request->name_of_account;
        $data->bank_account_country = $request->bank_account_country;
        $data->bank_name = $request->bank_name;
        $data->bank_account_class = $request->bank_account_class;
        $data->bank_account_type = $request->bank_account_type;
        $data->bank_routing = $request->bank_routing;
        $data->iban = $request->iban;
        $data->bank_verification_doc = $request->bank_verification_doc;
        $data->status = '0';
        
        if ($data->save()) {
            return view('frontend.start_new_campaign_confirmations')
               ->with('success','Your campaign create successfully. Thank you.');
        }else{
            return view('frontend.start_new_campaign_confirmations')
               ->with('error','Server error!!.');
        }
    }
}
