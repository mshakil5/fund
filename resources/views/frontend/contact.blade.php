@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<section class="contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title mb-5 fs-1 " >
                            Contact us Today 
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <img src="https://via.placeholder.com/520.png" alt="" class="w-100">
                    </div><div class="col-lg-6">
                      
                        <div class="theme-para ">
                            Fill out the form below and we’ll get back to you as   soon as we can.
                        </div>
                        <form action="" class="form-custom"> 
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Subject"> 
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Message"></textarea> 
                            </div>
                            <div class="form-group">
                                <a href="#" class="btn-theme bg-primary">Send</a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="default contactInfo">
    <div class="container">
        <div class="row ">
            <div class="col-lg-3 d-flex flex-column align-items-center">
                <div class="paratitle text-center">Phone</div>
                <p class="theme-para text-center">  07490 956 227  </p>
                <a href="#" class="btn-theme bg-primary">Call</a>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
                <div class="paratitle text-center">Whatsapp</div>
                <p class="theme-para text-center">  07490 956 227  </p>
                <a href="#" class="btn-theme bg-primary">Message</a>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
                <div class="paratitle text-center">Email</div>
                <p class="theme-para text-center"> info@mail.co.uk  </p>
                <a href="#" class="btn-theme bg-primary">Email</a>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-center">
                <div class="paratitle text-center">Address</div>
                <p class="theme-para text-center"> 5a Holmdale Terrace <br>
                    London N15 6PP</p>
                <a href="#" class="btn-theme bg-primary">Visit</a>
            </div>
            
        </div>
    </div>
</section>


@endsection

@section('scripts')
@endsection