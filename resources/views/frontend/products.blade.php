@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <form action="" class="form-custom">
                            <div class="searchBox p-0 mt-3 w-100 shadow-sm">
                                <input placeholder="Search..." type="text">
                                <button data-bs-toggle="modal" data-bs-target="#searchFundrisers">
                                    <iconify-icon icon="quill:search"></iconify-icon>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="bg-white">
    <div class="container-fluid px-4">
        <div class="row theme-para gx-4">
            <div class="col-lg-2 bg-light p-4">
                <h5 class="fw-bold mb-4">SORT</h5>
                <p class="d-flex justify-content-between align-items-center  ">
                    <span class=" "> Almost funded</span>
                    <input type="checkbox" name="" id="">
                </p>
                <p class="d-flex justify-content-between align-items-center  ">
                    <span class=" "> Newest</span>
                    <input type="checkbox" name="" id="">
                </p>
                <p class="d-flex justify-content-between align-items-center  ">
                    <span class=" "> Needs love</span>
                    <input type="checkbox" name="" id="">
                </p>
                <p class="d-flex justify-content-between align-items-center  ">
                    <span class=" ">Ending soon</span>
                    <input type="checkbox" name="" id="">
                </p>
                <hr>
                <h5 class="fw-bold mb-4">ZAKAT</h5>
                <p class="d-flex justify-content-between align-items-center  ">
                    <span class=" "> Zakat-verified</span>
                    <input type="checkbox" name="" id="">
                </p>
                <hr>
                <h5 class="fw-bold mb-4">COMMUNITIES</h5>
                <p class="d-flex justify-content-between align-items-center  ">
                    <span class=" "> Hide Community Campaigns</span>
                    <input type="checkbox" name="" id="">
                </p>

            </div>
            <div class="col-lg-10 bg-light p-4">
                <h3 class="mb-4 txt-secondary">Categories</h3>

                <ul class="nav nav-tabs " id="myTab" role="tablist">
                    @foreach ($categories as $key => $cat)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded @if ($key == 0) active @endif" id="{{$cat->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$cat->name}}-tab-pane" type="button" role="tab" aria-controls="{{$cat->name}}-tab-pane" aria-selected="true">{{$cat->name}}</button>
                    </li>
                    @endforeach
                    

                </ul>
                <div class="tab-content" id="myTabContent">

                    @foreach ($categories as $key => $cat)
                    <div class="tab-pane fade py-4 show  @if ($key == 0) active @endif" id="{{$cat->name}}-tab-pane" role="tabpanel"
                    aria-labelledby="{{$cat->name}}-tab" tabindex="0">
                        <div class="row gx-1">
                            <div class="col-md-12  txt-primary my-3">
                                {{-- <h4 class="fw-bold txt-secondary">Found 45 Campaigns</h4> --}}
                            </div>

                            @foreach ($campaigns as $campaign)

                            @if ($campaign->fundraising_source_id == $cat->id)
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
                            <div class="col-md-4">
                                <div class="card-theme mb-3">
                                    <div class="topper d-flex align-items-center justify-content-center">

                                        <a href="{{ route('frontend.campaignDetails',$campaign->id)}}" class="p-0 d-block"  tabindex="0">
                                            <img src="{{asset('images/campaign/'.$campaign->image)}}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <div class="inner">
                                            <div class="card-title text-start ">
                                                <a href="{{ route('frontend.campaignDetails',$campaign->id)}}" tabindex="0">
                                                    {{$campaign->title}}
                                                </a>
                                            </div>
                                            <div class="status d-flex py-2">
                                                <span class="d-flex align-items-center me-4">
                                                    <iconify-icon class="me-1"
                                                        icon="ic:baseline-people-outline"></iconify-icon>
                                                        {{$total_donar}}
                                                </span>
                                                <span class="d-flex align-items-center me-2">
                                                    <iconify-icon class="me-1"
                                                        icon="ic:round-access-time"></iconify-icon> {{$days}}
                                                    days
                                                    left
                                                </span>
                                            </div>
                                            <div class="progress " style="height: 7px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-3">
                                                <div>
                                                    <h4 class="mb-1 text-dark fw-bold">@if ($total_collection > 0) <small class="txt-primary">£{{$total_collection}}</small>  Raised @else @endif</h4>
                                                    <h6 class="mb-1 text-dark  fw-bold">funded of ${{$campaign->raising_goal}}</h6>
                                                </div>
                                                <div>
                                                    <a href="{{ route('frontend.campaignDetails',$campaign->id)}}" class="btn-theme bg-primary fs-6"
                                                        tabindex="0">Donate Now</a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @endforeach

                        </div>

                    </div>
                    @endforeach


                </div>

                <div class="row gx-1 mt-4">
                    <div class="col-md-12  txt-primary my-3">
                        <h4 class="fw-bold txt-secondary"> Organizations </h4>
                    </div>
                    @foreach ($charities as $charity)
                    <div class="col-md-4 px-2">
                        <div class="card p-4 shadow-sm">

                            @if (isset($charity->photo))
                                <a href="" class="p-0 d-block w-100">
                                    <img src="{{asset('images/'.$charity->photo)}}" class="img-fluid mx-auto rounded-circle" width="150px">
                                </a>
                            @else
                                <img src="https://via.placeholder.com/100.png" class="img-fluid mx-auto rounded-circle" width="150px">
                                
                                {{-- <img src="https://pmedia.launchgood.com/154100/orphans_in_need_usa_Orphans%20in%20Need%20USA_logo-400x400.jpg" class="img-fluid mx-auto rounded-circle" width="150px" > --}}
                            @endif

                            

                            <h5 class="my-3 fw-bold text-center"><a href="{{ route('frontend.charityDetails',$charity->id)}}">{{$charity->name}}</a></h5>
                            <a href="{{ route('frontend.charityDetails',$charity->id)}}" class="btn-theme bg-primary fs-6 w-75 mx-auto" >Donate Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                
            </div>
        </div>
    </div>
</section>








@endsection

@section('scripts')
@endsection