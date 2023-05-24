@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<div class="eventDetails">
    <div class="eventBg">
        <div class="eventBanner container">
            <img src="{{asset('images/event/'.$data->image)}}" alt="">
        </div>
    </div>
    <div class="container py-5">
        <div class="row px-3">
            <div class="col-md-8 mt-5 ">
                <h3 class="mb-0 darkerGrotesque-semibold txt-secondary">{{ \Carbon\Carbon::parse($data->event_start_date)->isoFormat('MMM Do YYYY')}}</h3>
                <h1 class="darkerGrotesque-bold mb-0">{{$data->title}}</h1>
                <p class="fs-5 mb-0 darkerGrotesque-bold txt-primary">{{$data->organizer}}</p>
                <h5 class="darkerGrotesque-semibold lh-1 fs-5 mt-3 text-dark">
                    <span class="darkerGrotesque-bold">Summery :</span>
                    <span class="text-muted">{{$data->summery}}</span>
                </h5>
                <div class="row mb-3 mt-4">
                    <div class="col-md-12">
                        <h4 class="fw-bold mb-3">When & where ? </h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center ">
                            <div class="">
                                <iconify-icon class="fs-1 me-2 txt-primary" icon="uim:calender"></iconify-icon>
                            </div>
                            <div class="">
                                <h5 class="mb-0 darkerGrotesque-bold txt-primary">Date and time</h5>
                                <h5 class="mb-0 darkerGrotesque-semibold">
                                    {{ \Carbon\Carbon::parse($data->event_start_date)->isoFormat('MMM Do YYYY')}} - {{ \Carbon\Carbon::parse($data->event_end_date)->isoFormat('MMM Do YYYY')}}
                                    {{-- {{$data->event_start_date}}-{{$data->event_end_date}} --}}
                                </h5>
                                <h5 class="mb-0 darkerGrotesque-semibold">
                                    {{ \Carbon\Carbon::parse($data->event_start_date)->isoFormat(' H:m:s A')}} - {{ \Carbon\Carbon::parse($data->event_end_date)->isoFormat(' H:m:s A')}}

                                    {{-- {{$data->event_start_date}}-{{$data->event_end_date}} --}}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex ">
                            <div class="">
                                <iconify-icon class="fs-1 me-2 txt-primary" icon="el:map-marker"></iconify-icon>
                            </div>
                            <div class="">
                                <h5 class="mb-0 darkerGrotesque-bold txt-primary">Location</h5>
                                <h5 class="mb-0 darkerGrotesque-semibold">{{$data->house_number}} {{$data->road_name}} {{$data->town}} {{$data->postcode}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row my-3">
                    <h3 class="darkerGrotesque-bold txt-primary">Refund Policy</h3>
                    <h5 class="mb-0 darkerGrotesque-semibold">Contact the organizer to request a refund.
                        Eventbrite's fee is nonrefundable.</h5>
                </div> --}}
                <div class="row my-3">
                    <h3 class="darkerGrotesque-bold txt-primary">About this event</h3>
                    <h5 class="mb-0 darkerGrotesque-semibold d-flex align-items-center">
                        
                        
                    </h5>
                    <p>
                        {!! $data->description !!}
                    </p>
                </div>
                {{-- <div class="row my-3">
                    <h3 class="darkerGrotesque-bold mb-3 txt-primary">Tags</h3>
                    <div class="d-flex flex-wrap">
                        <span
                            class="badge badge-pill bg-secondary darkerGrotesque-regular fs-5 d-inline me-2">Tag</span>
                        <span
                            class="badge badge-pill bg-secondary darkerGrotesque-regular fs-5 d-inline me-2">Tag</span>
                        <span
                            class="badge badge-pill bg-secondary darkerGrotesque-regular fs-5 d-inline me-2">Tag</span>
                        <span
                            class="badge badge-pill bg-secondary darkerGrotesque-regular fs-5 d-inline me-2">Tag</span>
                        <span class="badge badge-pill bg-secondary  fs-5 d-inline me-2">Tag</span>
                        <span class="badge badge-pill bg-secondary  fs-5 d-inline me-2">Tag</span>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-4 mt-5">
                <div class="border shadow-sm p-3 rounded">
                    <div class="p-3 border border-1 rounded shadow-sm bg-white ">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="darkerGrotesque-bold mb-0">General Admission</h4>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-theme bg-primary text-white">
                                    <iconify-icon icon="typcn:minus"></iconify-icon>
                                </button>
                                <span class="mx-2 fs-4 darkerGrotesque-bold">{{$data->quantity}}</span>
                                <button class="btn btn-sm btn-theme bg-primary px-3 text-white">
                                    <iconify-icon icon="typcn:plus"></iconify-icon>
                                </button>
                            </div>
                        </div> 
                        <h4 class="darkerGrotesque-bold my-3 txt-primary">£{{ number_format($data->price, 2) }}</h4>
                    </div>
                   <a href="#" class="btn btn-theme bg-secondary w-100 mt-2 mx-auto">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')


@endsection