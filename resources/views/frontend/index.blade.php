@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<section class="banner py-4 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="inner w-75">
                            <div class="intro-title">
                                Lorem ipsum dolor sit amet.
                            </div>
                            <p class="txt-theme mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex,
                                vel quia? Aliquam fugit magni blanditiis.</p>
                            <div>
                                <a href="{{ route('register')}}" class="btn-theme bg-secondary">Open an account</a>
                                <a href="{{ route('frontend.work')}}" class="btn-theme bg-primary">How it works</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="https://via.placeholder.com/510x440.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">

            <div class="title">We’re a not-for-profit company from Fundd Group</div>
            <div class="para text-center mt-4">
                <p> We don’t believe that business should profit from charity which is why we set up Fundd Money
                    Giving, as a much needed not-for-profit alternative to challenge the status quo.</p>
                <p>
                    Are you ready to make a difference?
                </p>
                <a href="#" class="btn-theme bg-secondary mx-auto">Create an account</a>
            </div>


        </div>
    </div>
</section>

<section class="campaign default">
    <div class="container">
        <div class="row">
            <div class="title">
                Featured Campaign
            </div>
        </div>
        <div class="row">


            @foreach ($campaign as $campaign)
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  ">
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                        <div class="inner">
                            <a href="{{ route('frontend.campaignDetails',$campaign->id)}}">
                                <div class="card-title">{{$campaign->title}}</div>
                            </a>
                            <div class="my-4">
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>@if ($campaign->total_collection > 0) £{{$campaign->total_collection}} Raised @else @endif</span>
                                    <span>Last day</span>
                                </p>
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£{{$campaign->raising_goal}} Goal </span>
                                    <span>Days left</span>
                                </p>
                            </div>
                            <a href="{{ route('frontend.campaignDetails',$campaign->id)}}"
                                class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            

        </div>
    </div>
</section>


    
@endsection

@section('scripts')
@endsection