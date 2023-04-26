@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="fundriser">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto p-4">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <div class="ermsg"></div>
                            <div class="title darkerGrotesque-bold lh-1 fs-1">Lets begin your fundriser journey
                            </div>
                            <h5 class="para text-center mt-3 text-muted fs-6">
                                we are here to guide you every step for thre way
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <form action="{{route('campaignConfirmation')}}" method="post">
                                @csrf
                                <div class="row my-3">
                                    {{-- hidden data  --}}
                                <input type="hidden" id="fund_raising_type" name="fund_raising_type" value="{{$fund_raising_type}}">
                                <input type="hidden" id="countryid" name="countryid" value="{{$countryid}}">
                                <input type="hidden" id="sourceid" name="sourceid" value="{{$sourceid}}">
                                <input type="hidden" id="title" name="title" value="{{$title}}">
                                <input type="hidden" id="story" name="story" value="{{$story}}">
                                <input type="hidden" id="raising_goal" name="raising_goal" value="{{$raising_goal}}">
                                <input type="hidden" id="video_link" name="video_link" value="{{$video_link}}">
                                <input type="hidden" id="tagline" name="tagline" value="{{$tagline}}">
                                <input type="hidden" id="category" name="category" value="{{$category}}">
                                <input type="hidden" id="location" name="location" value="{{$location}}">
                                <input type="hidden" id="funding_type" name="funding_type" value="{{$funding_type}}">
                                <input type="hidden" id="end_date" name="end_date" value="{{$end_date}}">
                                <input type="file" id="image" name="image[]" value="@foreach($image as $key => $d){{ $d }}@endforeach" hidden>
                                <input type="hidden" id="email" name="email" value="{{$email}}">
                                <input type="hidden" id="name" name="name" value="{{$name}}">
                                <input type="hidden" id="family_name" name="family_name" value="{{$family_name}}">
                                <input type="hidden" id="dob" name="dob" value="{{$dob}}">
                                <input type="hidden" id="phone" name="phone" value="{{$phone}}">
                                <input type="hidden" id="country_address" name="country_address" value="{{$country_address}}">
                                <input type="hidden" id="address" name="address" value="{{$address}}">
                                <input type="hidden" id="city" name="city" value="{{$city}}">
                                <input type="hidden" id="street_name" name="street_name" value="{{$street_name}}">
                                <input type="hidden" id="town" name="town" value="{{$town}}">
                                <input type="hidden" id="postcode" name="postcode" value="{{$postcode}}">
                                <input type="hidden" id="gov_issue_id" name="gov_issue_id" value="{{$gov_issue_id}}">
                                <input type="hidden" id="currency" name="currency" value="{{$currency}}">
                                <input type="hidden" id="name_of_account" name="name_of_account" value="{{$name_of_account}}">
                                <input type="hidden" id="bank_account_country" name="bank_account_country" value="{{$bank_account_country}}">
                                <input type="hidden" id="bank_name" name="bank_name" value="{{$bank_name}}">
                                <input type="hidden" id="bank_account_class" name="bank_account_class" value="{{$bank_account_class}}">
                                <input type="hidden" id="bank_account_type" name="bank_account_type" value="{{$bank_account_type}}">
                                <input type="hidden" id="bank_routing" name="bank_routing" value="{{$bank_routing}}">
                                <input type="hidden" id="iban" name="iban" value="{{$iban}}">
                                <input type="hidden" id="bank_verification_doc" name="bank_verification_doc" value="{{$bank_verification_doc}}">
                            

                                    <div class="col-lg-12 mt-3">
                                        <label for="" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Confirm your charity </label>
                                        <p class="para mb-3 text-muted fs-6 float-start"> <input type="checkbox" class="me-2" id="confirmcondition" required>lorem, ipsum dolor et semet lorem, ipsum dolor et semetlorem, ipsum dolor et semetlorem, ipsum dolor et semet lorem, ipsum dolor et semet lorem, ipsum dolor et semetlorem, ipsum dolor et semetlorem, ipsum dolor et semet</p>
                                    </div>
                                    <a href="{{ url()->previous() }}" class="btn-theme  bg-primary mx-auto mt-4">Back</a>
                                    <button type="submit" class="btn-theme bg-secondary mx-auto mt-4">Complete Fundriser</button>
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