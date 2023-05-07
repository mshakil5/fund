@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="fundriser my-2 py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="inner p-4">
                    <div class="row mb-4">
                        <a href="{{route('frontend.campaignDetails',$data->id)}}" class="text-start btn btn-theme bg-primary">
                            <iconify-icon icon="material-symbols:arrow-back-rounded"
                                class="text-white fs-4"></iconify-icon>
                            Return to fundriser</a>
                    </div>
                    <div class="row"> 
                        <div class="col-mg-12">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <img src="{{asset('images/campaign/'.$data->image)}}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-8">
                                    <p class="para fs-6 mb-1 text-muted py-2">{!!$data->story!!}</p>
                                    <b class="para mt-3 text-dark fs-6"> {{$data->title}} </b>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="para mt-2 text-dark fs-6 mb-2 fw-bold " for="">Enter Your
                                donation</label>
                            <input type="number" id="amount" name="amount" placeholder="£GBP" class="form-control py-3 border fs-1 fw-bold">
                        </div>
                        <div class="col-md-12 mt-3">
                            <p class="para fs-6 mb-2 text-dark">This donation will be displayed in the name of
                                <b>
                                    <div class="d-inline" title="You can update the name here " id="editable">
                                     "Mento Software"
                                    </div>
                                </b> 
                                <button onclick="goEdit();" class="btn btn-sm bg-primary fs-6 fw-bold py-0 text-white">Edit</button>
                                 
                             
                            </p>
                            <p class="para fs-6 mb-2 text-dark">
                                Because LaunchGood doesn't charge a platform fee, we rely on
                                the generosity of donors like you to continue to help more people. Thank you for
                                including a contribution of:
                            </p>
                            <select name="tips" id="tips" class="form-control fs-6 fw-bold my-4">
                                <option value="10" class="fs-6 fw-bold">10%</option>
                                <option value="15" class="fs-6 fw-bold">15%</option>
                                <option value="20" class="fs-6 fw-bold">20%</option>
                                <option value="30" class="fs-6 fw-bold">30%</option>
                            </select>

                            <p class="my-2 d-flex align-items-center ">
                                <input type="checkbox" class="me-2" name="" id="newsletter">
                                <label for="newsletter" class=" fs-6 text-dark para text-muted">
                                    <d class="txt-primary">Add me to the LaunchGood newsletter.</d>  stay updated with our global community.
                                </label>
                            </p>
                            <p class="my-2 d-flex align-items-center ">
                                <input type="checkbox" class="me-2" name="" id="receipts">
                                <label  for="receipts"class=" fs-6 text-dark para text-muted">
                                    <d class="txt-primary">Share my email & card billing address </d> to receive receipts for tax-deductible donations
                                </label>
                            </p>
                            <p class="my-2 d-flex align-items-center ">
                                <input type="checkbox" class="me-2" name="" id="campaign">
                                <label  for="campaign"class=" fs-6 text-dark para text-muted">
                                    <d class="txt-primary">Share my email address with this campaign creator
                                    </d>
                                    to receive marketing emails.
                                </label>
                            </p>
                            {{-- <div class="text-center mt-4">
                                <h3 class="fw-bold txt-secondary">Total : £45.90</h3>
                                <a href="#" class="btn btn-theme bg-secondary  mx-auto ">
                                    <iconify-icon icon="logos:google-icon" class="me-1 w-50"></iconify-icon>
                                    Pay
                                </a>
                            </div> --}}
                        </div>


                    </div>
                    <div class="  ">
                        <div class="title darkerGrotesque-bold lh-1 fs-3 mt-2">Payment Mathods </div>

                        <ul class="nav nav-tabs mt-2 border-0 py-4 justify-content-center  bg-transparent"
                            id="myTab" role="tablist">
                            <li class="nav-item fs-5 mx-2" role="presentation">
                                <label for="paypal">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center active"
                                        id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab"
                                        aria-controls="home" aria-selected="true">
                                        <div class="fw-bold d-flex align-items-center">
                                            <input type="radio" class="d-none" id="paypal" value="paypal"
                                                name="paymentMethod">
                                            <iconify-icon class="px-2" icon="ps:paypal"></iconify-icon> paypal
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li class="nav-item fs-5 mx-2" role="presentation">
                                <label for="google_pay">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center"
                                        id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">

                                        <div class="fw-bold d-flex align-items-center">
                                            <input type="radio" class="d-none" id="google_pay" value="google_pay"
                                                name="paymentMethod">
                                            <iconify-icon class="px-2"
                                                icon="flat-color-icons:google"></iconify-icon>
                                            Pay
                                        </div>

                                    </div>
                                </label>
                            </li>
                            <li class="nav-item fs-5 mx-2" role="presentation">
                                <label for="credit_card">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center"
                                        id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">

                                        <div class="fw-bold d-flex align-items-center">
                                            <input type="radio" class="d-none" id="credit_card" value="credit_card"
                                                name="paymentMethod">
                                            <iconify-icon class="px-2"
                                                icon="fluent-emoji-flat:credit-card"></iconify-icon> credit card
                                        </div>

                                    </div>
                                </label>
                            </li>
                        </ul>
                        <div class="tab-content shadow-sm" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">

                                api comes here
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                api comes here
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <form action="">
                                    <div class="row ">
                                        <div class="col-lg-6 ">
                                            <input type="email" class="form-control fs-5 mb-3 " placeholder="Email">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="text" class="form-control fs-5 mb-3 "
                                                placeholder="First name">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="text" class="form-control fs-5 mb-3 "
                                                placeholder="last name">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="checkbox" id="billing">
                                            <label for="billing" class="fs-5  ps-1 mb-1">Use a
                                                billing name</label>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="number" class="form-control fs-5 mb-3 "
                                                placeholder="Card number">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="date" class="form-control fs-5 mb-3 " placeholder="mm/yy">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="text" class="form-control fs-5 mb-3 " placeholder="CVV">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="number" class="form-control fs-5 mb-3 "
                                                placeholder="Postal Code">
                                        </div>
                                        <div class="col-lg-6 ">
                                            <input type="text" class="form-control fs-5 mb-3 "
                                                placeholder="Name on card">
                                        </div>
                                        <div class="col-lg-6 ">
                                           <select name="" class="form-control fs-5 mb-3" id="">
                                            <option value="">Countrys</option>
                                           </select>
                                        </div>
                                        <div class="col-lg-12  ">
                                            <input type="checkbox" id="donation">
                                            <label for="donation" class="fs-5 fw-bold ps-1">Save card for future
                                                donation
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                       <div class="row my-3">
                        <div class="col-md-6 d-flex align-items-center  lh-1  my-1">
                            <input type="checkbox" id="public">
                            <label for="public" class="fs-5 fw-bold ps-2 text-dark flex-1">
                                Dont display my name publicly on fundriser
                            </label>
                        </div>
                        <div class="col-md-6  d-flex align-items-center lh-1 my-1">
                            <input type="checkbox" id="updates">
                            <label for="updates" class="fs-5 fw-bold ps-2 text-dark flex-1"> Yes signme up to here updates
                                from taxdocs about how to change people lives.
                            </label>
                        </div>
                       </div>
                        <div class="col-md-12 my-2 ">
                            <h4 class="fw-bold txt-secondary my-3">Your donation</h4>
                            <hr class="my-1">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <div class="fs-6 para">Your donation</div>
                                <div class="fs-6 para">
                                    <h5 class="fs-6 para"><span id="donation_amount"></span></h5>
                                </div>
                            </div>
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <div class="fs-6 para">Your Tip</div>
                                <div class="fs-6 para">
                                    <h5 class="fs-6 para"><span id="donation_tips"></span></h5>
                                </div>
                            </div>
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <div class="fs-6 para">Commission</div>
                                <div class="fs-6 para">
                                    <h5 class="fs-6 para"><span id="donation_commission"></span></h5>
                                </div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <div class="fs-6 para">Total due today</div>
                                <div class="fs-6 para">
                                    <h5 class="fs-6 para"><span id="net_donation_amount"></span></h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12  mt-4 d-flex align-items-center">
                            <button class="btn btn-primary btn-theme mx-auto w-50 bg-primary">Donate now! </button>
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
    function goEdit(){
        let editable = document.getElementById("editable");
         editable.setAttribute('contenteditable','true'); 
         editable.focus();
         setEndOfContenteditable(editable);
    }
</script>


<script>
   $(document).ready(function() {
        //calculation end
        $("#amount").keyup(function(){
            var amount = Number($("#amount").val());
            var tips = Number($("#tips").val());
            var total_tips = (amount * tips)/100;
            var total_amount = amount + total_tips;
            var commission = (total_amount * 10)/100;
            var net_amount = total_amount + commission;
            
            $("#donation_amount").html("£"+ amount.toFixed(2));
            $("#donation_tips").html("£"+ total_tips.toFixed(2));
            $("#donation_commission").html("£"+ commission.toFixed(2));
            $("#net_donation_amount").html("£"+ net_amount.toFixed(2));
        });
        //calculation end  
        //calculation end
        $("#tips").change(function(){
            var amount = Number($("#amount").val());
            var tips = Number($("#tips").val());
            var total_tips = (amount * tips)/100;
            var total_amount = amount + total_tips;
            var commission = (total_amount * 10)/100;
            var net_amount = total_amount + commission;
            
            $("#donation_amount").html("£"+ amount.toFixed(2));
            $("#donation_tips").html("£"+ total_tips.toFixed(2));
            $("#donation_commission").html("£"+ commission.toFixed(2));
            $("#net_donation_amount").html("£"+ net_amount.toFixed(2));
        });
        //calculation end  
    });   
</script>
@endsection