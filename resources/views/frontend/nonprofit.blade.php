@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="title darkerGrotesque-bold lh-1">Make a difference with fundraising for nonprofits</div>
            <div class="para text-center mt-4">
                <p> The fast and easy way to raise money for the nonprofits you care about. <br>
                    START FUNDRAISING FOR YOUR FAVORITE NONPROFIT
                </p>
            </div>
            <div class="searchBox p-0 mt-3">
                <input placeholder="Search..." type="text">
                <button data-bs-toggle="modal" data-bs-target="#searchFundrisers">
                    <iconify-icon icon="quill:search"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</section>
<section class="campaign default">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="inner w-75">
                            <div class="text-left txt-primary display-5 mb-4 darkerGrotesque-bold lh-1">
                                How to fundraise for a nonprofit on GoFundM
                            </div>
                            <p class="txt-theme mb-4">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum
                                is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's standard dummy</p>
                            <div>
                                <a href="#" class="btn-theme bg-primary">Fund Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="https://via.placeholder.com/410x350.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaign default" style="background-color: #E9E1DA;">
    <div class="container">
        <div class="row">
            <div class="title">
                Trending nonprofit fundraisers
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  ">
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                        <div class="inner">
                            <div class="card-title">Lorem, ipsum dolor.</div>
                            <div class="my-4">
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£679 Raised </span>
                                    <span>Last day</span>
                                </p>
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£120,000 Goal </span>
                                    <span>Days left</span>
                                </p>
                            </div>
                            <a href="#" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  ">
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                        <div class="inner">
                            <div class="card-title">Lorem, ipsum dolor.</div>
                            <div class="my-4">
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£679 Raised </span>
                                    <span>Last day</span>
                                </p>
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£120,000 Goal </span>
                                    <span>Days left</span>
                                </p>
                            </div>
                            <a href="#" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 upperGap">
                <div class="card-theme  ">
                    <div class="topper">
                        <img src="https://via.placeholder.com/100.png" alt="" class="rounded-circle">
                    </div>
                    <div class="card-body pt-5">
                        <div class="inner">
                            <div class="card-title">Lorem, ipsum dolor.</div>
                            <div class="my-4">
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£679 Raised </span>
                                    <span>Last day</span>
                                </p>
                                <p class="d-flex mb-0 justify-content-between flex-wrap">
                                    <span>£120,000 Goal </span>
                                    <span>Days left</span>
                                </p>
                            </div>
                            <a href="#" class="btn-theme bg-primary mx-auto w-50 text-center d-block">Donate Now</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-lg-6 mx-auto mt-5">
                <a href="all-transaction.html" class="btn-theme bg-secondary mx-auto w-50 text-center d-block">View all Transactions</a>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')
@endsection