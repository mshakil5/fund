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

            {{-- event details section  --}}
            <div class="col-md-8 mt-5 " id="eventDesc">

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
            {{-- event details section  --}}

            {{-- checkout section  --}}
            <div class="col-md-8 mt-5 " id="paymentSection">
                
                <div class="inner p-4">
                    <div class="row mb-4">
                        <a id="backBtn" class="text-start btn btn-theme bg-primary"><iconify-icon icon="material-symbols:arrow-back-rounded" class="text-white fs-4"></iconify-icon> Back</a>
                    </div>
                    <div class="  ">
                        <div class="title darkerGrotesque-bold lh-1 fs-3">Payment Mathods</div>
                        <ul class="nav nav-tabs mt-4 border-0 py-4 justify-content-center  bg-transparent" id="myTab" role="tablist">
                            <li class="nav-item fs-5 mx-2" role="presentation">
                                <label for="paypal">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center rounded active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <div class="fw-bold d-flex align-items-center">
                                            <input type="radio" class="d-none" id="paypal" value="paypal"
                                                name="paymentMethod">
                                            <iconify-icon class="px-2 py-2" icon="ps:paypal"></iconify-icon>
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li class="nav-item fs-5 mx-2" role="presentation">
                                <label for="google_pay">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center rounded" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                        <div class="fw-bold d-flex align-items-center">
                                            <input type="radio" class="d-none" id="google_pay" value="" name="paymentMethod">
                                            <iconify-icon class="px-2 py-2" icon="logos:stripe"></iconify-icon>
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li class="nav-item fs-5 mx-2" role="presentation">
                                <label for="credit_card">
                                    <div class="nav-link shadow-sm d-flex align-items-center justify-content-center rounded" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                        <div class="fw-bold d-flex align-items-center">
                                            <input type="radio" class="d-none" id="credit_card" value="credit_card" name="paymentMethod">
                                            <iconify-icon class="px-2 py-2" icon="fluent-emoji-flat:credit-card"></iconify-icon>
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
                                
                                <div class="ermsg">
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                <!-- Include the Stripe Elements JS library -->
                                <script src="https://js.stripe.com/v3/"></script>
        
                                <!-- Create a form to collect card details -->
                                <form id="payment-form">
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Donation Amount</label>
                                            <input class='form-control' id="amount" name="amount" placeholder='£' type='number' step="any" required>
                                        </div>
                                    </div>
        
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label>
                                            <input class='form-control' id="cardholder-name" name="cardholder_name" size='4' type='text' required>
                                        </div>
                                    </div>
                                    <br> 
                                    <input type="hidden" name="c_amount" id="c_amount" value="">    
                                    <input type="hidden" name="event_id" id="event_id" value="{{$data->id}}">  
                                    <div id="card-element"></div>
                                    <div class="col-lg-12  mt-4 d-flex align-items-center">
                                        <button id="payButton" type="submit" class="btn btn-primary btn-theme mx-auto w-50 bg-primary">Pay</button>
                                    </div>
                                </form>
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
                    </div>
                </div>

                
            </div>
            {{-- checkout section end --}}


            <div class="col-md-4 mt-5">
                <div class="border shadow-sm p-3 rounded">
                    <div class="p-3 border border-1 rounded shadow-sm bg-white ">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="darkerGrotesque-bold mb-0">General Admission</h4>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-theme bg-primary text-white">
                                    <iconify-icon icon="typcn:minus"></iconify-icon>
                                </button>
                                <span class="mx-2 fs-4 darkerGrotesque-bold">1</span>
                                <button class="btn btn-sm btn-theme bg-primary px-3 text-white">
                                    <iconify-icon icon="typcn:plus"></iconify-icon>
                                </button>
                            </div>
                        </div> 
                        
                        <h4 class="darkerGrotesque-bold my-3 txt-primary">£{{ number_format($data->price, 2) }}</h4>
                    </div>
                   <a id="chkoutBtn" class="btn btn-theme bg-secondary w-100 mt-2 mx-auto">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
$(document).ready(function () {

    $("#paymentSection").hide();
    $("#chkoutBtn").click(function(){
        $("#paymentSection").show(300);
        $("#eventDesc").hide(300);
        $("#chkoutBtn").hide(300);

    });
    $("#backBtn").click(function(){
        $("#paymentSection").hide(200);
        $("#eventDesc").show(200);
        $("#chkoutBtn").show(200);
    });

});
</script>


<script>
    // Create a Stripe instance with your publishable key
    var stripe = Stripe('pk_test_51N5D0QHyRsekXzKiScNvPKU4rCAVKTJOQm8VoSLk7Mm4AqPPsXwd6NDhbdZGyY4tkqWYBoDJyD0eHLFBqQBfLUBA00tj1hNg3q');
  
    // Create a card element and mount it to the card-element div
    var cardElement = stripe.elements().create('card');
    cardElement.mount('#card-element');
  
    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
  
      // Create a PaymentMethod and confirm the PaymentIntent on the backend
      stripe.createPaymentMethod('card', cardElement).then(function(result) {
        if (result.error) {
          // Handle errors (e.g. invalid card details)
          console.error(result.error);
          $(".ermsg").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>"+result.error.message+"</b></div>");
        } else {
          // Send the PaymentMethod ID to your backend
          var paymentMethodId = result.paymentMethod.id;
          confirmPayment(paymentMethodId);
        }
      });
    });
  
    var url = "{{URL::to('/event-payment')}}";
    // Function to confirm the PaymentIntent on the backend
    function confirmPayment(paymentMethodId) {
        
        var amount = $("#amount").val();
        var cardHolderName = $("#cardholder-name").val();
        var event_id = $("#event_id").val();
        var c_amount = $("#c_amount").val();

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json', // Specify the Accept header for JSON
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },

        body: JSON.stringify({ payment_method_id: paymentMethodId, amount: amount, cardHolderName: cardHolderName, event_id:event_id, c_amount:c_amount })
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        console.log(data);
        // Handle the response from the backend
        if (data.client_secret) {
          stripe.confirmCardPayment(data.client_secret).then(function(result) {
            if (result.error) {
                $(".ermsg").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>"+result.error.message+"</b></div>");
              // Handle errors (e.g. authentication required)
              console.error(result.error);
            } else {
              // Payment successful
              $(".ermsg").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Payment Successfull.</b></div>");
              console.log(result.paymentIntent);
              window.setTimeout(function(){location.reload()},2000)
            }
          });
        }
      });
    }
</script>
@endsection