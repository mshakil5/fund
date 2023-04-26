@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="fundriser">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto p-4">
                <div class="inner">
                    
                    <div class="row mt-4">
                        <div class="col-lg-9 mx-auto">
                            <div class="title darkerGrotesque-bold lh-1 fs-3">Tell us a bit more about basic information
                            </div>
                            <form action="{{route('campaignPersonalInfo')}}" method="GET">
                                {{-- @csrf --}}
                            

                                {{-- hidden data  --}}
                                <input type="hidden" id="fund_raising_type" name="fund_raising_type" value="{{$fund_raising_type}}">
                                <input type="hidden" id="countryid" name="countryid" value="{{$countryid}}">
                                <input type="hidden" id="sourceid" name="sourceid" value="{{$sourceid}}">
                                <input type="hidden" id="title" name="title" value="{{$title}}">
                                <input type="hidden" id="story" name="story" value="{{$story}}">

                                    <h4 class="fs-4  mb-2 darkerGrotesque-bold txt-secondary">
                                        How much would you like to raise?</h4>
                                    <h6 class="para text-muted fs-6">Keep the mind that transaction fees, including credit and debit charges are deducted from each donation.</h6>

                                    
                                    <input type="number" class="my-3 form-control fs-4" placeholder="Your starting goal" id="raising_goal" name="raising_goal">
                                    <p class="para text-muted fs-6">
                                        To received money raised, please make sure the person withdrawing has:
                                    </p>
                                    <div class="alert  para text-muted fs-6 shadow-sm" role="alert">
                                        <ul class="list-group list-group-numbered">
                                            <li class="list-group-item">A national insurance number</li>
                                            <li class="list-group-item">A bank account in the United Kingdom</li>
                                            <li class="list-group-item">A mailing address in the united kingdom</li>
                                        </ul>
                                    </div>
                                    <div class="title darkerGrotesque-bold lh-1 fs-3 txt-secondary">Add a cover photo or video
                                    </div>
                                    <h5 class="para text-center mt-3 text-muted fs-6">
                                        Who are you fundrising for
                                    </h5>
                                    <div class="row my-3">
                                        <div class="col-lg-6 ">
                                            <label for="image" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Upload Photo</label>
                                            <input type="file" name="image[]" class="form-control" id="image" multiple>
                                            
                                            <div class="col-md-12 my-2" style="display: none">
                                                <div class="preview2"></div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="video_link" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Upload Video Link </label>
                                            <input type="text" name="video_link" class="form-control" id="video_link">
                                        </div>

                                    </div>
                                    
                                    <div class="title darkerGrotesque-bold lh-1 fs-3 txt-secondary">Tell donor why you are fundrising </div>
                                    <h5 class="para text-center mt-3 text-muted fs-6">
                                        Some idea to help you start writing
                                    </h5>
                                    <div class="alert  para text-muted fs-6 shadow-sm" role="alert">
                                        <ul class="list-group list-group-numbered">
                                            <li class="list-group-item">Introduce yourself and what you are raising funds for</li>
                                            <li class="list-group-item">Describe why it's important to you</li>
                                            <li class="list-group-item">Explain how the funds will be used</li>
                                        </ul>
                                    </div>
                                    <div class="row my-3">

                                            <div class="col-lg-6 ">
                                                <label for="tagline" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Tagline</label>
                                                <input type="text" name="tagline" class="form-control" id="tagline">
                                            </div>
                                            <div class="col-lg-6 ">
                                                <label for="category" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Category </label>
                                                <input type="text" name="category" class="form-control" id="category">
                                            </div>

                                            
                                        <div class="col-lg-12 mb-3">
                                            <label for="location" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Location </label>
                                            <input type="text" name="location" class="form-control" id="location" value="">
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="funding_type" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Funding Type</label>
                                            <input type="text" name="funding_type" class="form-control" id="funding_type">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="end_date" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> End Date </label>
                                            <input type="date" name="end_date" class="form-control" id="end_date">
                                        </div>
    

                                        <a href="{{route('newcampaigngeninfo')}}" class="btn-theme  bg-primary mx-auto mt-4">Back</a>
                                        <button type="submit" class="btn-theme bg-secondary mx-auto mt-4">Next</button>

                                        

                                        </form>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('script')
<script>

$(document).ready(function() {
    
});


</script>

@endsection