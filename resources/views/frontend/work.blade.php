@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')




<section class="how-we-works default">
    <div class="container">
        <div class="row flex-column">
            <img src="https://via.placeholder.com/260.png" style="width:260px;" class=" mx-auto"/> <br>
            <div class="title darkerGrotesque-bold lh-1">How We works</div>
            <div class="para text-center mt-4">
                Whilst you can't do this for free, you can do it without making a profit.
At Fundd, we exist to make giving go further, so together we can transform more lives and communities around the world. 
            </div>
            <a href="#" class="btn-theme bg-secondary mx-auto mt-4">Fund Now</a>
        </div>
    </div>
</section>

<section class="  py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row py-5">
                    <div class="col-lg-12  px-3  ">
                        <div class="title darkerGrotesque-bold lh-1 mb-5">
                           Why choose us ?
                        </div> 
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5 ">
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center text-center">
                                <img src="https://via.placeholder.com/160.png" class="me-3 img-fluid" />
                            </div>
                            <div class="col-lg-8">
                                <div class="paratitle">Lorem, ipsum.</div>
                            <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perferendis natus voluptas magni voluptatem .</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6 mb-5 ">
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center text-center">
                                <img src="https://via.placeholder.com/160.png" class="me-3 img-fluid" />
                            </div>
                            <div class="col-lg-8">
                                <div class="paratitle">Lorem, ipsum.</div>
                            <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perferendis natus voluptas magni voluptatem .</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6 mb-5 ">
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center text-center">
                                <img src="https://via.placeholder.com/160.png" class="me-3 img-fluid" />
                            </div>
                            <div class="col-lg-8">
                                <div class="paratitle">Lorem, ipsum.</div>
                            <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perferendis natus voluptas magni voluptatem .</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-6 mb-5 ">
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center text-center">
                                <img src="https://via.placeholder.com/160.png" class="me-3 img-fluid" />
                            </div>
                            <div class="col-lg-8">
                                <div class="paratitle">Lorem, ipsum.</div>
                            <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perferendis natus voluptas magni voluptatem .</div>
                            </div>
                        </div> 
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client faq default " id="faq">
    <div class="container">
        <div class="row">
            <div class="title txt-primary">
                Frequently asked questions:
            </div>
            <br>
            <div class="mt-5">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How do you charge and how much?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quos fugiat nostrum voluptas quas laboriosam explicabo harum illo deleniti cupiditate optio hic iure, quae officia.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How can I check how much money I have in my charity account?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quos fugiat nostrum voluptas quas laboriosam explicabo harum illo deleniti cupiditate optio hic iure, quae officia.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can I donate to charities abroad with my Donation account?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quos fugiat nostrum voluptas quas laboriosam explicabo harum illo deleniti cupiditate optio hic iure, quae officia.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                When will my donation reach the recipient?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quos fugiat nostrum voluptas quas laboriosam explicabo harum illo deleniti cupiditate optio hic iure, quae officia.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                What is GiftAid and how does it work?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Gift aid is an arrangement between the government and charities in the United
                                Kingdom where charities can claim back basic rate tax on donations from qualifying
                                donors. This means that for every pound donated by a qualifying donor, the charity
                                can reclaim 25p from HMRC.

                                For example, if somebody donates £100 to a charity, the charity can reclaim an
                                additional £25 from HM Revenue and Customs (HMRC), making the total value of the
                                donation £125.

                                The system works by the taxpayer completing a self-assessment form (known as a Gift
                                Aid declaration) which authorises the charity to reclaim tax on their behalf. The
                                money is then paid back to the charity by HMRC.

                                At Donation, we’ll do that for you. You just need to open an account and we’ll make
                                sure that your donation is increased by 25%.

                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="w-100 d-flex align-items-center justify-content-center">
                <a href="#" class="mx-auto mt-5 btn-theme bg-secondary ">Ask another question</a>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
@endsection