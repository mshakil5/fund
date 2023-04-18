<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\Admin\ContactMailController; 
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FundraisingSourceController;



/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
  
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex')->name('admin.registration');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end
    //user registration
    Route::get('user-register','App\Http\Controllers\Admin\AdminController@userindex')->name('alluser');;
    Route::post('user-register','App\Http\Controllers\Admin\AdminController@userstore');
    Route::get('user-register/{id}/edit','App\Http\Controllers\Admin\AdminController@useredit');
    Route::put('user-register/{id}','App\Http\Controllers\Admin\AdminController@userupdate');
    Route::get('user-register/{id}', 'App\Http\Controllers\Admin\AdminController@userdestroy');
    //user registration end

    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end

    // create fundraiser from admin
    Route::get('/new-fundraiser', [UserController::class, 'newfundraiser'])->name('admin.newfundraiser');
    Route::post('/new-fundraiser', [UserController::class, 'newfundraiserstore']);
    Route::get('/new-fundraiser/{id}/edit', [UserController::class, 'newfundraiseredit']);
    Route::post('/new-fundraiser-update', [UserController::class, 'newfundraiserupdate']);
    Route::get('/new-fundraiser/{id}', [UserController::class, 'newfundraiserdelete']);

    // create charity from admin
    Route::get('/charity', [CharityController::class, 'getCharityByAdmin'])->name('admin.allcharity');
    Route::post('/charity', [CharityController::class, 'newCharitystore']);
    Route::get('/charity/{id}/edit', [CharityController::class, 'newCharityedit']);
    Route::post('/charity-update', [CharityController::class, 'newCharityupdate']);
    Route::get('/charity/{id}', [CharityController::class, 'newCharitydelete']);


    // campaign
    Route::get('/campaign', [CampaignController::class, 'getCampaignByAdmin'])->name('admin.campaign');
    Route::post('/campaign', [CampaignController::class, 'storeCampaignByAdmin']);
    Route::get('/campaign/{id}/edit', [CampaignController::class, 'editCampaignByAdmin']);
    Route::post('/campaign/{id}', [CampaignController::class, 'updateCampaignByAdmin']);
    Route::get('/campaign/{id}', [CampaignController::class, 'deleteCampaignByAdmin']);

    // active deactive campaign
    Route::get('active-campaign', [CampaignController::class, 'activeCampaign']);
    

    // photo
    Route::get('/photo', [ImageController::class, 'index'])->name('admin.photo');
    Route::post('/photo', [ImageController::class, 'store']);
    Route::get('/photo/{id}/edit', [ImageController::class, 'edit']);
    Route::put('/photo/{id}', [ImageController::class, 'update']);
    Route::get('/photo/{id}', [ImageController::class, 'delete']);
    
    // fundraising-source
    Route::get('/fundraising-source', [FundraisingSourceController::class, 'index'])->name('admin.fundraisingsource');
    Route::post('/fundraising-source', [FundraisingSourceController::class, 'store']);
    Route::get('/fundraising-source/{id}/edit', [FundraisingSourceController::class, 'edit']);
    Route::put('/fundraising-source/{id}', [FundraisingSourceController::class, 'update']);
    Route::get('/fundraising-source/{id}', [FundraisingSourceController::class, 'delete']);


    // contact mail 
    Route::get('/contact-mail', [ContactMailController::class, 'index'])->name('admin.contact-mail');
    Route::get('/contact-mail/{id}/edit', [ContactMailController::class, 'edit']);
    Route::put('/contact-mail/{id}', [ContactMailController::class, 'update'])->name('admin.contact.update');
});
//admin part end