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
                                {{\App\Models\Slider::where('id','1')->first()->left_title}}
                            </div>
                            <p class="txt-theme mb-4">{{\App\Models\Slider::where('id','1')->first()->left_description}}</p>
                            <div>
                                <a href="{{route('register')}}" class="btn-theme bg-secondary">Open an account</a>
                                <a href="{{route('frontend.work')}}" class="btn-theme bg-primary">How it works</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 steps my-5  ">
                        <div class="w-100 px-3">
                            <div class="row mb-4">
                                <h3 class="  lh-1 fw-bold" style="color:#265080;">
                                    {{\App\Models\Slider::where('id','1')->first()->right_header}}
                                </h3>
                            </div>
                            <div class="inner">
                                <div class="items">
                                    <div class="circle shadow-sm">
                                        <iconify-icon class="fs-1 txt-primary "
                                            icon="material-symbols:filter-1-rounded"></iconify-icon>
                                    </div>
                                    <div class="content">
                                        <h3 class="mb-1 fw-bold txt-primary">{{\App\Models\Slider::where('id','1')->first()->right_title1}}</h3>
                                        <p class="mb-1 txt-theme">{{\App\Models\Slider::where('id','1')->first()->right_description1}}</p>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="circle shadow-sm">

                                        <iconify-icon class="fs-1 txt-primary "
                                            icon="material-symbols:filter-2"></iconify-icon>
                                    </div>
                                    <div class="content">
                                        <h3 class="mb-1 fw-bold txt-primary">{{\App\Models\Slider::where('id','1')->first()->right_title2}}</h3>
                                        <p class="mb-1 txt-theme">{{\App\Models\Slider::where('id','1')->first()->right_description2}}</p>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="circle shadow-sm">
                                        <iconify-icon class="fs-1 txt-primary "
                                            icon="material-symbols:filter-3"></iconify-icon>
                                    </div>
                                    <div class="content">
                                        <h3 class="mb-1 fw-bold txt-primary">{{\App\Models\Slider::where('id','1')->first()->right_title3}}</h3>
                                        <p class="mb-1 txt-theme">{{\App\Models\Slider::where('id','1')->first()->right_description3}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">

            <div class="title">{{\App\Models\Master::where('name','homepage2ndsection')->first()->title}}</div>
            <div class="para text-center mt-4">
                {!! \App\Models\Master::where('name','homepage2ndsection')->first()->description !!}
                <a href="{{route('register')}}" class="btn-theme bg-secondary mx-auto">Create an account</a>
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
        <div class="row mt-5">
            @foreach ($campaign as $campaign)

            @php
                $today = $todate->format('Y-m-d');
                $end = $campaign->end_date;
                $datetime1 = new DateTime($today);
                $datetime2 = new DateTime($end);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                $total_collection = $campaign->transaction->sum('amount');
                $total_donar = $campaign->transaction->count();
            @endphp

            <div class="col-lg-4 col-md-6 ">
                <div class="card-theme mb-3">
                    <div class="topper d-flex align-items-center justify-content-center">
                        <a href="{{ route('frontend.campaignDetails',$campaign->id)}}" class="p-0 d-block">
                            <img src="{{asset('images/campaign/'.$campaign->image)}}">
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="inner">
                            <div class="card-title text-start ">
                                <a href="{{ route('frontend.campaignDetails',$campaign->id)}}">
                                    {{$campaign->title}}
                                </a>
                            </div>
                            <div class="status d-flex py-2">
                                <span class="d-flex align-items-center me-4">
                                    <iconify-icon class="me-1" icon="ic:baseline-people-outline"></iconify-icon>
                                    {{$total_donar}}
                                </span>
                                <span class="d-flex align-items-center me-2">
                                    <iconify-icon class="me-1" icon="ic:round-access-time"></iconify-icon> 
                                    {{$days}} days left
                                </span>
                            </div>
                            <div class="progress " style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div>
                                    <h4 class="mb-1 text-dark fw-bold">@if ($total_collection > 0) £{{$total_collection}} Raised @else @endif</h4>
                                    <h6 class="mb-1 text-dark  fw-bold">funded of £{{$campaign->raising_goal}}</h6>
                                </div>
                                <div>
                                    <a href="{{ route('frontend.campaignDetails',$campaign->id)}}" class="btn-theme bg-primary">Donate Now</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            @endforeach


            {{-- <div class="col-lg-4 col-md-6 ">
                <div class="card-theme mb-3">
                    <div class="topper">
                        <a href="#" class="p-0">
                            <img src="https://via.placeholder.com/1000x700.png">
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="inner">
                            <div class="card-title text-start ">
                                <a href="#">
                                    Help Save Families in Yemen from Famine this Ramadan
                                </a>
                            </div>
                            <div class="status d-flex py-2">
                                <span class="d-flex align-items-center me-4">
                                    <iconify-icon class="me-1" icon="ic:baseline-people-outline"></iconify-icon>
                                    1051
                                </span>
                                <span class="d-flex align-items-center me-2">
                                    <iconify-icon class="me-1" icon="ic:round-access-time"></iconify-icon> 10 days
                                    left
                                </span>
                            </div>
                            <div class="progress " style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div>
                                    <h4 class="mb-1 text-dark fw-bold">$60,032</h4>
                                    <h6 class="mb-1 text-dark  fw-bold">funded of $70K</h6>
                                </div>
                                <div>
                                    <a href="#" class="btn-theme bg-primary">Donate Now</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 ">
                <div class="card-theme mb-3">
                    <div class="topper">
                        <a href="#" class="p-0">
                            <img src="https://via.placeholder.com/1000x700.png">
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="inner">
                            <div class="card-title text-start ">
                                <a href="#">
                                    Help Save Families in Yemen from Famine this Ramadan
                                </a>
                            </div>
                            <div class="status d-flex py-2">
                                <span class="d-flex align-items-center me-4">
                                    <iconify-icon class="me-1" icon="ic:baseline-people-outline"></iconify-icon>
                                    1051
                                </span>
                                <span class="d-flex align-items-center me-2">
                                    <iconify-icon class="me-1" icon="ic:round-access-time"></iconify-icon> 10 days
                                    left
                                </span>
                            </div>
                            <div class="progress " style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div>
                                    <h4 class="mb-1 text-dark fw-bold">$60,032</h4>
                                    <h6 class="mb-1 text-dark  fw-bold">funded of $70K</h6>
                                </div>
                                <div>
                                    <a href="#" class="btn-theme bg-primary">Donate Now</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div> --}}



        </div>
    </div>
</section>
{{-- <section class="banner py-4 d-flex align-items-center">
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
</section> --}}

{{-- <section class="campaign default">
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
</section> --}}


    
@endsection

@section('scripts')
@endsection