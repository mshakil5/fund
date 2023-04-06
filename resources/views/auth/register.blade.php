@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


<section class="auth py-4">
    <div class="container">
       
        <div class="row my-5">
            <div class="col-lg-10 mx-auto authBox">
                <div class="row">
                    <div class="col-lg-7 d-flex align-items-center justify-content-center">
                        <img src="https://via.placeholder.com/510x540.png" alt="" class="w-100">
                    </div>
                    <div class="col-lg-5"> 
                         
                        <form method="POST" action="{{ route('register') }}" class="form-custom py-4">
                            @csrf
                              <div class="title text-center mb-5 txt-secondary">Create Account</div>
                            <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="Phone Number"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Address"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Town"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="Post code"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password"> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Confirm Password"> 
                            </div>
                            <!-- <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Message"></textarea> 
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn-theme bg-primary d-block text-center mx-0 w-100">Sign up</button>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <span class="txt-primary fs-20 me-2 ">or</span>
                                 <a href="{{ route('login')}}" class="theme-link"> log into another account</a>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section> 

@endsection
