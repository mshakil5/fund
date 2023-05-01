@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="title darkerGrotesque-bold lh-1">{{\App\Models\Master::where('name','about')->first()->title}}</div>
            <div class="para text-center mt-4">
                {!! \App\Models\Master::where('name','about')->first()->description !!}
                <a href="{{route('newcampaign')}}" class="btn-theme bg-secondary mx-auto">Fund Now</a>
            </div>
        </div>
    </div>
</section> 
<section class="campaign default">
    <div class="container">
        <div class="row mb-5">
            <div class="title ">
                We help charities, raise more
            </div>
        </div>
        <br>
        <div class="row"> 
            <div class="col-lg-4 ">
                <div class="about-card text-center">
                    <img src="https://via.placeholder.com/100.png" class="img-circle">
                    <div class="title">Lorem, ipsum.</div>
                    <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eius aliquam
                        nobis molestiae velit doloremque ad, aliquid, nulla accusamus obcaecati quos, incidunt
                        numquam eum autem.</div>
                </div>
            </div> 
            <div class="col-lg-4 ">
                <div class="about-card text-center">
                    <img src="https://via.placeholder.com/100.png" class="img-circle">
                    <div class="title">Lorem, ipsum.</div>
                    <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eius aliquam
                        nobis molestiae velit doloremque ad, aliquid, nulla accusamus obcaecati quos, incidunt
                        numquam eum autem.</div>
                </div>
            </div> 
            <div class="col-lg-4 ">
                <div class="about-card text-center">
                    <img src="https://via.placeholder.com/100.png" class="img-circle">
                    <div class="title">Lorem, ipsum.</div>
                    <div class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eius aliquam
                        nobis molestiae velit doloremque ad, aliquid, nulla accusamus obcaecati quos, incidunt
                        numquam eum autem.</div>
                </div>
            </div> 
        </div>
    </div>
</section>


@endsection

@section('scripts')
@endsection