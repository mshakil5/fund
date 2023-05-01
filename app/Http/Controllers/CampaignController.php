<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\FundraisingSource;
use App\Models\Campaign;
use DB;
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

    public function campaignDonate($id)
    {
        $campaign = Campaign::where('id','!=',$id)->whereStatus(1)->orderby('id','DESC')->get();
        $data = Campaign::where('id',$id)->first();
        return view('frontend.campaignpayment', compact('data','campaign'));
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

    public function editCampaignByAdmin($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Campaign::where($where)->get()->first();
        return response()->json($info);
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

    // step 1 show
    public function step1_show_startCampaign()
    {
        return view('frontend.step1_new_campaign');
    }

    // step 1 post
    public function step1_post_startCampaign(Request $request)
    {
        $validatedData = $request->validate([
            'fund_raising_type' => 'required',
        ]);

        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();

        $step1data = $request->all();
        session()->put('step1data', $step1data);
        $step2Dataform = session()->get('step2data');
        if ($step2Dataform != null) {
            return view('frontend.step2_new_campaign_geninfo', ['step2Data' => $step2Dataform,'country' => $country,'source' => $source]);
        }
        return view('frontend.step2_new_campaign_geninfo', ['country' => $country,'source' => $source]);
    }


    // step 2 show
    public function step2_show_CampaignGeneralInfo(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();

        $step2Dataform = session()->get('step2data');

        if ($step2Dataform != null) {
            return view('frontend.step2_new_campaign_geninfo', ['step2Data' => $step2Dataform,'country' => $country,'source' => $source]);
        }
        return view('frontend.step2_new_campaign_geninfo', ['country' => $country,'source' => $source]);

       
    }



    // step 2 post
    public function step2_post_CampaignGeneralInfo(Request $request)
    {
        $country = Country::select('id','name')->get();
        $source = FundraisingSource::select('id','name')->get();


        $step2data = $request->all();
        session()->put('step2data', $step2data);

        $step3dataForm = session()->get('step3data');

        if ($step3dataForm != null) {

            return view('frontend.step3_new_campaign_basicinfo',compact('step3dataForm'));
        }

        return view('frontend.step3_new_campaign_basicinfo');
    }


    // step 3 show
    public function step3_show_CampaignBasicInfo(Request $request)
    {


        $step3dataForm = session()->get('step3data');

        if ($step3dataForm != null) {

            return view('frontend.step3_new_campaign_basicinfo',compact('step3dataForm'));
        }

        return view('frontend.step3_new_campaign_basicinfo');


    }


    // step 3 post
    public function step3_post_CampaignBasicInfo(Request $request)
    {
 

        // $step3data = $request->all();
        
        $step3data = [
            "video_link" => $request->video_link, 
            "raising_goal" => $request->raising_goal,
            "tagline" => $request->tagline,
            "category" => $request->category,
            "location" => $request->location,
            "funding_type" => $request->funding_type,
            "end_date" => $request->end_date
        ];


        // dd($step3data);


        if ($request->image) {
            $chkimg = CampaignImage::whereNull('campaign_id')->where('user_id',Auth::user()->id)->get();
            if (isset($chkimg)) {
                foreach ($chkimg as $key => $camimg) {
                    $image_path = public_path('images/campaign/'.$camimg->image);
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                
            }
            DB::table('campaign_images')->whereNull('campaign_id')->where('user_id',Auth::user()->id)->delete();
            // $media= [];
            foreach ($request->image as $key => $img) {
                // dd($key,  $img);
                $rand = mt_rand(100000, 999999);
                $imageName = time(). $rand .'.'.$img->extension();
                $img->move(public_path('images/campaign'), $imageName);
                //insert into picture table
                $pic = new CampaignImage();
                $pic->image = $imageName;
                $pic->user_id = Auth::user()->id;
                $pic->created_by = Auth::user()->id;
                $pic->save();
            }
        }
        session()->put('step3data', $step3data);

        $step4dataForm = session()->get('step4data');

        if ($step4dataForm != null) {

            return view('frontend.step4_new_campaign_personalinfo',compact('step4dataForm'));
        }

        return view('frontend.step4_new_campaign_personalinfo');


    }
    

    public function step4_show_CampaignPersonalInfo(Request $request)
    {
        $step4dataForm = session()->get('step4data');
        if ($step4dataForm != null) {

            return view('frontend.step4_new_campaign_personalinfo',compact('step4dataForm'));
        }
     
        return view('frontend.step4_new_campaign_personalinfo');
    }

    public function step4_post_CampaignPersonalInfo(Request $request)
    {
        
        $step4data = $request->all();
        session()->put('step4data', $step4data);

        $step5dataForm = session()->get('step5data');

        if ($step5dataForm != null) {

            return view('frontend.step5_new_campaign_bankinfo',compact('step5dataForm'));
        }
        return view('frontend.step5_new_campaign_bankinfo');
    }

    public function step5_show_startCampaignBankInfo(Request $request)
    {
        $step5dataForm = session()->get('step5data');

        if ($step5dataForm != null) {

            return view('frontend.step5_new_campaign_bankinfo',compact('step5dataForm'));
        }

        return view('frontend.step5_new_campaign_bankinfo');
    }

    public function step5_post_startCampaignBankInfo(Request $request)
    {
        $step5data = $request->all();
        session()->put('step5data', $step5data);

        return view('frontend.step6_new_campaign_terms');
    }

    public function step6_show_CampaignTermsCondition(Request $request)
    {
  
  
        return view('frontend.step6_new_campaign_terms');
    }

    public function step6_post_Campaignconfirmation(Request $request)
    {
        $step6data = $request->all();
        session()->put('step6data', $step6data);
  
        return view('frontend.step6_new_campaign_terms');
    }

    public function startCampaign_dataStore(Request $request)
    {
        $step1dataForm = session()->get('step1data');
        $step2dataForm = session()->get('step2data');
        $step3dataForm = session()->get('step3data');
        $step4dataForm = session()->get('step4data');
        $step5dataForm = session()->get('step5data');
        $step6dataForm = session()->get('step6data');

        // dd($step3dataForm['image']);

        $data = new Campaign;
        $data->fund_raising_type = $step1dataForm['fund_raising_type'];;
        if (Auth::user()) {
            $data->user_id = Auth::user()->id;
        }
        $data->country_id = $step2dataForm['country'];
        $data->fundraising_source_id = $step2dataForm['source'];
        $data->title = $step2dataForm['title'];
        $data->story = $step2dataForm['story'];
        $data->raising_goal = $step3dataForm['raising_goal'];
        // $data->image = $request->image;
        $data->video_link = $step3dataForm['video_link'];
        $data->tagline = $step3dataForm['tagline'];
        $data->category = $step3dataForm['category'];
        $data->location = $step3dataForm['location'];
        $data->funding_type = $step3dataForm['funding_type'];
        $data->end_date = $step3dataForm['end_date'];
        $data->email = $step4dataForm['email'];
        $data->name = $step4dataForm['name'];
        $data->family_name = $step4dataForm['family_name'];
        $data->dob = $step4dataForm['dob'];
        $data->phone = $step4dataForm['phone'];
        $data->country_address = $step4dataForm['country_address'];
        $data->address = $step4dataForm['address'];
        $data->city = $step4dataForm['city'];
        $data->street_name = $step4dataForm['street_name'];
        $data->town = $step4dataForm['town'];
        $data->postcode = $step4dataForm['postcode'];
        $data->gov_issue_id = $step4dataForm['gov_issue_id'];
        $data->currency = $request->currency;
        $data->name_of_account = $request->name_of_account;
        $data->bank_account_country = $request->bank_account_country;
        $data->bank_name = $request->bank_name;
        $data->bank_account_class = $request->bank_account_class;
        $data->bank_account_type = $request->bank_account_type;
        $data->bank_routing = $request->bank_routing;
        $data->iban = $request->iban;
        if ($request->bank_verification_doc != 'null') {
            $request->validate([
                'bank_verification_doc' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->bank_verification_doc->extension();
            $request->bank_verification_doc->move(public_path('images/bank'), $imageName);
            $data->bank_verification_doc= $imageName;
        }
        $data->status = '0';

        if ($data->save()) {

            CampaignImage::whereNull("campaign_id")->where('user_id',Auth::user()->id)
                ->update(["campaign_id" => $data->id]);
            
            $request->session()->forget('step1data');
            $request->session()->forget('step2data');
            $request->session()->forget('step3data');
            $request->session()->forget('step4data');
            $request->session()->forget('step5data');
            $request->session()->forget('step6data');

            return view('frontend.step7_new_campaign_confirmations')
               ->with('success','Your campaign create successfully. Thank you.');
        }else{
            return view('frontend.step7_new_campaign_confirmations')
               ->with('error','Server error!!.');
        }
    }
}
