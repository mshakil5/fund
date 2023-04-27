<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\Auth\RegisterController;

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


// start a new campaign
Route::get('/start-a-new-campaign', [CampaignController::class, 'startCampaign'])->name('newcampaign');
    // this route create for test 
// Route::get('/campaign-information', [CampaignController::class, 'startCampaignGeneralInfo'])->name('newcampaigngeninfo');
    // end
Route::post('/campaign-information', [CampaignController::class, 'startCampaignGeneralInformation'])->name('newcampaigngeninfo');
Route::post('/campaign-basic-information', [CampaignController::class, 'startCampaignBasicInformation'])->name('campaignBasicInfo');
Route::post('/campaign-personal-information', [CampaignController::class, 'startCampaignPersonalInformation'])->name('campaignPersonalInfo');
Route::post('/campaign-bank-information', [CampaignController::class, 'startCampaignBankInformation'])->name('campaignBankInfo');
Route::post('/campaign-terms-condition', [CampaignController::class, 'startCampaignTermsCondition'])->name('campaignTermCondition');
Route::post('/campaign-confirmations', [CampaignController::class, 'startCampaignconfirmation'])->name('campaignConfirmation');

Route::get('/campaign/{id}', [FrontendController::class, 'campaignDetails'])->name('frontend.campaignDetails');

/*----------------------Charity Registration-----------------------*/
Route::get('/charity-registration', [CharityController::class, 'charity'])->name('charity.register');
Route::post('/charity-registration', [CharityController::class, 'charityregistration'])->name('charity.registration');
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
});
  

