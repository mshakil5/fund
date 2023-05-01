@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row">
            <h3 class="fw-bold txt-primary mb-4">Our Beautiful Charlotte Louise Ollard(Smith)</h3>
            <div class="col-lg-8">
                <div class="popup-gallery shadow-sm p-4 bg-white">
                    <a href="https://via.placeholder.com/711x304.png" class="image" title="Some Text for the image">
                        <img src="https://via.placeholder.com/711x304.png" alt="Alt text" />
                    </a>

                    <!-- <a href="https://www.youtube.com/watch?v=smE-uIljiGo" class="video" title="This is a video">
                      <img src="https://via.placeholder.com/510x440.png" alt="Alt text" />
                    </a> -->

                </div>
                <ul class="nav nav-tabs justify-content-start mt-4 mb-2 rounded-0" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5 active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Story</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">Update</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                            aria-controls="contact-tab-pane" aria-selected="false">Comments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="disabled-tab" data-bs-toggle="tab"
                            data-bs-target="#disabled-tab-pane" type="button" role="tab"
                            aria-controls="disabled-tab-pane" aria-selected="false">Donor</button>
                    </li>
                </ul>
                <div class="tab-content fs-5 mb-4" id="myTabContent">
                    <div class="tab-pane fade p-4 bg-white show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        Lorem ipsum dolor sit amet Atque, deserunt a, nesciunt explicabo culpa officia aperiam
                        repellat, enim quod veritatis fugit mollitia! Dicta, cumque saepe.
                        Lorem ipsum dolor sit amet Atque, deserunt a, nesciunt explicabo culpa officia aperiam
                        repellat, enim quod veritatis fugit mollitia!
                    </div>
                    <div class="tab-pane fade p-4 bg-white" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab" tabindex="0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, deserunt a, nesciunt
                        explicabo culpa officia aperiam repellat, enim q a, cumque saepe.
                    </div>
                    <div class="tab-pane fade p-4 bg-white" id="contact-tab-pane" role="tabpanel"
                        aria-labelledby="contact-tab" tabindex="0">
                        Lorem ipsum dolor llat, enim quod veritatis fugit mollitia! Dicta, cumque saepe.
                    </div>
                    <div class="tab-pane fade p-4 bg-white" id="disabled-tab-pane" role="tabpanel"
                        aria-labelledby="disabled-tab" tabindex="0"> git mollitia! Dicta, cumque saepe.
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-4 rounded sideCard">
                    <div class=" display-6 fw-bold"> £3,260 </div>
                    <big> <span class="w-100 fw-bold">raised of £1,000 goal</span></big>

                    <div class="d-flex justify-content-between my-3 ">
                        @if (Auth::user())
                            <a href="{{ route('frontend.campaignDonate',$data->id)}}" class="btn-theme bg-secondary w-100 me-1 ms-0">Donate Now</a>
                        @else
                            <!-- Button trigger modal -->
                            <button type="button"  class="btn-theme bg-secondary w-100 me-1 ms-0" style="border: none;background: #18988b;color: white;" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Donate Now
                                </button>
                        @endif

                        <button class="btn-theme bg-primary w-100 ms-1" data-bs-toggle="modal"
                            data-bs-target="#shareModal">Share</button>
                    </div>


                    
                    <div class=" my-2 d-flex align-items-center justify-content-between">
                        <div>
                            <img src="https://via.placeholder.com/60x60.png" alt="" class="img-fluid rounded">
                            <h5 class="user d-inline ms-2 fw-bold">
                                Martin Smith
                            </h5>
                        </div>
                        <h3 class="fw-bold">$150</h3>
                    </div>


                    
                    

                    <div class="my-3">
                        <a href="#" class="btn-theme bg-primary w-100 ms-1">View More..</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- share modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content fs-5 darkerGrotesque-semibold ">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="shareModalLabel">Help by sharing</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark lh-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima ratione
                        excepturi accusamus!</p>
                    <hr>
                    <div class="shareIcons">
                        <div class="items text-center shadow-sm">
                            <a href="" class="d-flex flex-column justify-content-center align-items-center">
                                <iconify-icon class="fs-3" icon="logos:facebook"></iconify-icon>
                                <div class="txt-primary fw-bold">Facebook</div>
                            </a>
                        </div>
                        <div class="items text-center shadow-sm">
                            <a href="" class="d-flex flex-column justify-content-center align-items-center">
                                <iconify-icon class="fs-3" icon="logos:twitter"></iconify-icon>
                                <div class="txt-primary fw-bold">Twitter</div>
                            </a>
                        </div>
                        <div class="items text-center shadow-sm">
                            <a href="" class="d-flex flex-column justify-content-center align-items-center">
                                <iconify-icon class="fs-3" icon="ic:outline-email"></iconify-icon>
                                <div class="txt-primary fw-bold">Email</div>
                            </a>
                        </div>
                        <div class="items text-center shadow-sm">
                            <a href="" class="d-flex flex-column justify-content-center align-items-center">
                                <iconify-icon class="fs-3" icon="logos:whatsapp-icon"></iconify-icon>
                                <div class="txt-primary fw-bold">whatsapp</div>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control fs-5"  id="myInput" style="height:46px;"
                            value="https:link.share000124.com">
                        <button class="btn btn-theme bg-primary"  onclick="copyTextFS()">Copy</button>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <!--Login  Modal -->
<div  class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @if(session()->has('message'))
            <p class="alert alert-success"> {{ session()->get('message') }}</p>
            @endif
             
            <form method="POST" action="{{ route('loginto') }}" class="form-custom">
                @csrf

                <div class="title text-center txt-secondary">LOGIN</div>
                <div class="form-group">
                    <input type="hidden" name="campaignid" id="campaignid" value="{{$data->id}}">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <br>
                <div class="form-group">
                    <button type="submit" class="btn-theme bg-primary d-block text-center mx-0 w-100">Login </button>
                </div>
                <div class="form-group d-flex justify-content-center">
                     <a href="{{ route('register')}}" class="btn-theme bg-secondary d-block text-center mx-0 w-100"> Apply for an account</a>
                </div>
            </form>



        </div>
        
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection