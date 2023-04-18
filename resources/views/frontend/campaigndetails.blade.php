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
                        <a href="#" class="btn-theme bg-secondary w-100 me-1 ms-0">Donate Now</a>
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


@endsection

@section('scripts')
@endsection