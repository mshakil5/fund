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
                            <div class="title darkerGrotesque-bold lh-1 fs-3">Tell us a bit more about your fundriser
                            </div>
                            <form action="{{route('startanewfund3')}}" method="post">
                                @csrf
                            
                                    <h4 class="fs-4  mb-2 darkerGrotesque-bold txt-secondary">
                                        Email</h4>
                                    <input type="email" class="my-3 form-control fs-4" placeholder="Your email" id="email" name="email">

                                    
                                    
                                    <div class="row my-3">
                                        <div class="col-lg-6 ">
                                            <label for="name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Name</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="family_name" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Family Name </label>
                                            <input type="text" name="family_name" class="form-control" id="family_name">
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="dob" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Date of birth</label>
                                            <input type="date" name="dob" class="form-control" id="dob">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <label for="phone" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Phone Number </label>
                                            <input type="text" name="phone" class="form-control" id="phone">
                                        </div>


                                        <div class="col-lg-12 mb-3">
                                            <label for="country_address" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Country </label>
                                            <input type="text" name="country_address" class="form-control" id="country_address">
                                        </div>
                                        <div class="col-lg-12 ">
                                            <label for="address" class="fs-5  mb-2 darkerGrotesque-medium fw-bold">Address </label>
                                            <textarea name="address" id="address" class="form-control"></textarea>
                                        </div>

                                            <div class="col-lg-6 ">
                                                <label for="city" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">City</label>
                                                <input type="text" name="city" class="form-control" id="city">
                                            </div>
                                            <div class="col-lg-6 ">
                                                <label for="street_name" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Street Name</label>
                                                <input type="text" name="street_name" class="form-control" id="street_name">
                                            </div>
                                            <div class="col-lg-6 ">
                                                <label for="town" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Town </label>
                                                <input type="text" name="town" class="form-control" id="town">
                                            </div>
                                            <div class="col-lg-6 ">
                                                <label for="postcode" class="fs-5  mb-2 darkerGrotesque-medium fw-bold"> Post code </label>
                                                <input type="text" name="postcode" class="form-control" id="postcode">
                                            </div>

                                            
                                        

                                        <div class="col-lg-12 ">
                                            <label for="gov_issue_id" class="fs-5 mb-2 darkerGrotesque-medium fw-bold">Government Issued ID</label>
                                            <input type="text" name="gov_issue_id" class="form-control" id="gov_issue_id">
                                        </div>
                                        
                                        <button type="submit" class="btn-theme bg-secondary mx-auto mt-4 saveBtn" id="saveBtn">Next</button>

                                        

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