@extends('frontend.layouts.master')

@section('content')

<section class="campaign default" id="update-profile">
    <div class="container">
       
       <div class="col-lg-10 mx-auto">
        <h3 class="fw-bold darkerGrotesque-bold txt-primary mb-5">Your Profile</h3>
        <div class="row">
            <div class="col-lg-4 fs-5 shadow-sm p-4 border">
                <img src="https://via.placeholder.com/510x440.png" class="img-fluid" alt="">
                
            </div>
            <div class="col-lg-8 fs-5 shadow-sm p-4 border d-flex align-items-center position-relative">
                <div class="row darkerGrotesque-semibold "> 

                        <p class="mb-1"> Name: lorem ipsum dolor </p>
                        <p class="mb-1"> Phone: +880212112 </p>
                        <p class="mb-1"> email: user@user.com </p>
                        <p class="mb-1"> House Number: 45 </p>
                        <p class="mb-1"> Street: 12/78 lorem ipsum </p>
                        <p class="mb-1"> Post Code: 7400 </p>
                   
                   

                </div>
                <a href="user-profile-edit.html"class="editProfile"><iconify-icon icon="material-symbols:edit"></iconify-icon></a>
            </div>

        </div>
       </div>
    </div>
</section>



@endsection
