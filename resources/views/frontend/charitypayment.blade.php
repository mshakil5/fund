@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')
<style>
    /* Custom styles for Card Element iframe */
.StripeElement {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    color: #32325d;
    background-color: #f8f8f8;
    border: 1px solid #ced4da;
    border-radius: 4px;
}
#card-element{
    margin-bottom: 20px;

}
#payButton{
    background-color: #007bff; /* Set the background color */
    color: #fff; /* Set the text color */
    font-size: 18px; /* Set the font size */
    padding: 10px 20px; /* Set padding */
    border: none; /* Remove border */
    border-radius: 4px; /* Set border radius */
    cursor: pointer; /* Set cursor */
}

/* Custom styles for invalid input in Card Element iframe */
.StripeElement--invalid {
    border-color: #fa755a;
}
</style>


<section class="fundriser my-2 py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="inner p-4">
                    <div class="row mb-4">
                        <a href="{{ url()->previous() }}" class="text-start btn btn-theme bg-primary">
                            <iconify-icon icon="material-symbols:arrow-back-rounded"
                                class="text-white fs-4"></iconify-icon>
                            Return to fundriser</a>
                    </div>
                    <div class="row"> 
                        <div class="col-mg-12">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    @if (isset($data->photo))
                                        <img src="{{asset('images/'.$data->photo)}}" alt="" class="img-fluid">
                                    @else
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/06/A_poor_man.jpg" class="img-fluid">
                                    @endif
                                </div>
                                <div class="col-lg-8">
                                    <p class="para fs-6 mb-1 text-muted py-2">
                                    <b class="para mt-3 text-dark fs-6"> {{$data->name}} </b>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="para mt-2 text-dark fs-6 mb-2 fw-bold " for="">Enter Your
                                donation</label>
                            <input type="number" id="d_amount" name="d_amount" placeholder="£GBP" class="form-control py-3 border fs-1 fw-bold">
                        </div>
                        <div class="col-md-12 mt-3">
                            <select name="tips" id="tips" class="form-control fs-6 fw-bold my-4">
                                <option value="10" class="fs-6 fw-bold">10%</option>
                                <option value="15" class="fs-6 fw-bold">15%</option>
                                <option value="20" class="fs-6 fw-bold">20%</option>
                                <option value="30" class="fs-6 fw-bold">30%</option>
                            </select>
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

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
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
                                    <input type="hidden" name="donor_id" id="donor_id" value="{{auth()->user()->id}}">    
                                    <input type="hidden" name="c_amount" id="c_amount" value="">    
                                    <input type="hidden" name="charity_id" id="charity_id" value="{{$data->id}}">  
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


                        {{-- <div class="col-lg-12  mt-4 d-flex align-items-center">
                            <button class="btn btn-primary btn-theme mx-auto w-50 bg-primary">Donate now! </button>
                        </div> --}}

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
        //calculation end
        $("#d_amount").keyup(function(){
            var amount = Number($("#d_amount").val());
            var commission = (amount * 10)/100;
            var net_amount = amount + commission;
            
            $("#amount").val(net_amount.toFixed(2));
            $("#c_amount").val(commission.toFixed(2));
        });
        //calculation end  
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
  
    var url = "{{URL::to('/charity-payment')}}";
    // Function to confirm the PaymentIntent on the backend
    function confirmPayment(paymentMethodId) {
        
        var amount = $("#amount").val();
        var donor_id = $("#donor_id").val();
        var charity_id = $("#charity_id").val();
        var c_amount = $("#c_amount").val();

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json', // Specify the Accept header for JSON
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },

        body: JSON.stringify({ payment_method_id: paymentMethodId, amount: amount, donor_id: donor_id, c_amount:c_amount,charity_id:charity_id })
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