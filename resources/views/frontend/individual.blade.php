@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="title darkerGrotesque-bold lh-1">Make a difference with fundraising for nonprofits</div>
            <div class="para text-center mt-4">
                <p> The fast and easy way to raise money for the nonprofits you care about. <br>
                    START FUNDRAISING FOR YOUR FAVORITE NONPROFIT
                </p>
            </div>
            <!-- <div class="searchBox p-0 mt-3">
                <input placeholder="Search..." type="text" >
                <button>
                    <iconify-icon icon="quill:search"></iconify-icon>
                </button>
            </div> -->
            <div class="d-flex align-items-center justify-content-center"> 
                <a href="{{route('newcampaign')}}" class="btn-theme bg-primary">Start A new fundriser</a>
            </div>
        </div>
    </div>
</section>

<section class="campaign default"  >
    <div class="container">
        <div class="row">
            <div class="title">
                Individual Campaign
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  "> 
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                       <div class="inner">
                        <div class="card-title">Lorem, ipsum dolor.</div>
                      <div class="my-4"> 
                        <p class="d-flex mb-0 justify-content-between flex-wrap">
                            <span>£679 Raised </span>
                            <span>Last day</span>
                        </p>
                        <p class="d-flex mb-0 justify-content-between flex-wrap">
                            <span>£120,000 Goal </span>
                            <span>Days left</span>
                        </p>
                      </div>
                        <a href="#" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                       </div>
                    </div>
               </div>

            </div>
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  "> 
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                       <div class="inner">
                        <div class="card-title">Lorem, ipsum dolor.</div>
                      <div class="my-4"> 
                        <p class="d-flex mb-0 justify-content-between flex-wrap">
                            <span>£679 Raised </span>
                            <span>Last day</span>
                        </p>
                        <p class="d-flex mb-0 justify-content-between flex-wrap">
                            <span>£120,000 Goal </span>
                            <span>Days left</span>
                        </p>
                      </div>
                        <a href="#" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                       </div>
                    </div>
               </div>

            </div>
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  "> 
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                       <div class="inner">
                        <div class="card-title">Lorem, ipsum dolor.</div>
                      <div class="my-4"> 
                        <p class="d-flex mb-0 justify-content-between flex-wrap">
                            <span>£679 Raised </span>
                            <span>Last day</span>
                        </p>
                        <p class="d-flex mb-0 justify-content-between flex-wrap">
                            <span>£120,000 Goal </span>
                            <span>Days left</span>
                        </p>
                      </div>
                        <a href="#" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                       </div>
                    </div>
               </div>

            </div> 
        </div>
    </div>
</section>


@endsection

@section('scripts')
@endsection