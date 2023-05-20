<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// cache clear
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
 });
//  cache clear

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::post('/loginto', [LoginController::class, 'loginToDonate'])->name('logintodonate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/work', [FrontendController::class, 'work'])->name('frontend.work');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('frontend.privacy');
Route::get('/terms', [FrontendController::class, 'terms'])->name('frontend.terms');

Route::get('/non-profit', [FrontendController::class, 'nonprofit'])->name('frontend.nonprofit');
Route::get('/individual', [FrontendController::class, 'individual'])->name('frontend.individual');
Route::get('/fundriser', [FrontendController::class, 'fundriser'])->name('frontend.fundriser');

Route::post('/contact-submit', [FrontendController::class, 'visitorContact'])->name('contact.submit');

Route::get('/campaign/{id}', [FrontendController::class, 'campaignDetails'])->name('frontend.campaignDetails');

/*----------------------Charity Registration-----------------------*/
Route::get('/charity-registration', [CharityController::class, 'charity'])->name('charity.register');
Route::post('/charity-registration', [CharityController::class, 'charityregistration'])->name('charity.registration');


/*------------------------------------------
--------------------------------------------
All Normal Authenticate Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => ['auth']], function(){

    // start a new campaign
    Route::get('/start-a-new-campaign', [CampaignController::class, 'step1_show_startCampaign'])->name('newcampaign_show');
    Route::post('/start-a-new-campaign', [CampaignController::class, 'step1_post_startCampaign'])->name('newcampaign_post');

    Route::get('/campaign-information', [CampaignController::class, 'step2_show_CampaignGeneralInfo'])->name('newcampaigngeninfo_show');
    Route::post('/campaign-information', [CampaignController::class, 'step2_post_CampaignGeneralInfo'])->name('newcampaigngeninfo_post');

    Route::get('/campaign-basic-information', [CampaignController::class, 'step3_show_CampaignBasicInfo'])->name('campaignBasicInfo_show');
    Route::post('/campaign-basic-information', [CampaignController::class, 'step3_post_CampaignBasicInfo'])->name('campaignBasicInfo_post');

    //step 4
    Route::get('/campaign-personal-information', [CampaignController::class, 'step4_show_CampaignPersonalInfo'])->name('campaignPersonalInfo_show');
    Route::post('/campaign-personal-information', [CampaignController::class, 'step4_post_CampaignPersonalInfo'])->name('campaignPersonalInfo_post');

    //step 5
    Route::get('/campaign-bank-information', [CampaignController::class, 'step5_show_startCampaignBankInfo'])->name('campaignBankInfo_show');
    Route::post('/campaign-bank-information', [CampaignController::class, 'step5_post_startCampaignBankInfo'])->name('campaignBankInfo_post');

    //step 6
    Route::get('/campaign-terms-condition', [CampaignController::class, 'step6_show_CampaignTermsCondition'])->name('campaignTermCondition_show');
    Route::post('/campaign-confirmations', [CampaignController::class, 'step6_post_Campaignconfirmation'])->name('campaignTermCondition_post');

    // new campaign data store
    Route::post('/campaign-confirmations', [CampaignController::class, 'startCampaign_dataStore'])->name('campaignConfirmation_post');

    // campaign donate
    Route::get('/campaign-donate/{id}', [CampaignController::class, 'campaignDonate'])->name('frontend.campaignDonate');
    Route::get('/charity-donate/{id}', [CharityController::class, 'charityDonate'])->name('frontend.charityDonate');

    Route::post('/campaign-message', [FrontendController::class, 'campaignMessage'])->name('campaign.message');

    // comment 
    Route::post('/campaign-comment', [CommentController::class, 'campaignComment'])->name('campaign.comment');
    
    // Route::get('stripe', [StripeController::class, 'stripe']);
    Route::post('/campaign-payment', [StripeController::class,'CampaignPyament'])->name("stripe.post");
    Route::post('/charity-payment', [StripeController::class,'charityPyament'])->name("charitypayment");
    
    Route::get('/referral/campaign', [FundraiserController::class, 'getCampaignReferralLink']);
    Route::post('/referral/campaign', [FundraiserController::class, 'storeCampaignReferralLink'])->name('user.confirmrefcapmaign');

    

});



/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'user/', 'middleware' => ['auth', 'is_user']], function(){

    Route::post('profile-update', [UserController::class, 'updateProfile'])->name('user.updateprofile');
    Route::get('user-profile', [HomeController::class, 'userHome'])->name('user.profile');
    Route::get('donation-history', [DonationController::class, 'donationHistory'])->name('user.donationhistory');
    Route::get('my-campaign', [FundraiserController::class, 'activeCampaign'])->name('user.activecampaign');
    Route::get('ref-campaign', [FundraiserController::class, 'referralCampaign'])->name('user.refcampaign');
    Route::get('all-transaction', [TransactionController::class, 'allTransaction'])->name('user.alltransaction');
    Route::get('start-a-new-campaign', [CampaignController::class, 'newCampaign'])->name('user.newcampaign');
    Route::post('fund-raise', [CampaignController::class, 'newCampaignStore'])->name('user.newcampaignstore');
});
  
/*------------------------------------------
--------------------------------------------
All Agent Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'charity/', 'middleware' => ['auth', 'is_agent']], function(){
  
    Route::get('charity-profile', [HomeController::class, 'charityHome'])->name('charity.profile');
    Route::get('all-transaction', [TransactionController::class, 'allCharityTransaction'])->name('charity.alltransaction');
});
  

