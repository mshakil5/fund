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
                            <div class="title darkerGrotesque-bold lh-1 fs-3">Tell us a bit more about your bank information
                            </div>
                            <form action="{{route('campaignTermCondition')}}" method="GET">
                                {{-- @csrf --}}

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
                            
                                <div class="row my-3">
                                    <div class="col-lg-12 mb-3">
                                        <label for="currency" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Currency </label>
                                        <input type="text" name="currency" class="form-control" id="currency" required>
                                    </div>

                                    <div class="col-lg-12 ">
                                        <label for="name_of_account" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Name of the account</label>
                                        <input type="text" name="name_of_account" class="form-control" id="name_of_account" required>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <label for="bank_account_country" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Country </label>
                                        <input type="text" name="bank_account_country" class="form-control" id="bank_account_country" required>
                                    </div>

                                    <div class="col-lg-12 ">
                                        <label for="bank_name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Name</label>
                                        <input type="bank_name" name="bank_name" class="form-control" id="bank_name" required>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label for="bank_account_class" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Bank Account Class </label>
                                        <select name="bank_account_class" id="bank_account_class"  class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Personal">Personal</option>
                                            <option value="Corporate">Corporate</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label for="bank_account_type" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Bank Account Type </label>
                                        <select name="bank_account_type" id="bank_account_type"  class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Checking">Checking</option>
                                            <option value="Saving">Saving</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label for="bank_routing" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Bank Routing </label>
                                        <select name="bank_routing" id="bank_routing"  class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="SWIFT">SWIFT</option>
                                            <option value="BIC">BIC</option>
                                            <option value="Sort Code">Sort Code</option>
                                            <option value="BSB">BSB</option>
                                        </select>
                                    </div>


                                    <div class="col-lg-6">
                                        <label for="iban" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">IBAN </label>
                                        <input type="text" name="iban" class="form-control" id="iban" required>
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <label for="bank_verification_doc" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Bank Verification Document</label>
                                        <input type="file" name="bank_verification_doc" class="form-control" id="bank_verification_doc" required>
                                    </div>
                                    
                                    <a href="{{ url()->previous() }}" class="btn-theme  bg-primary mx-auto mt-4">Back</a>
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