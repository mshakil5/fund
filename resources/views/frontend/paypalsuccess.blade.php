@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="bleesed default">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="title darkerGrotesque-bold lh-1">
                Payment is Successfull. Your Transaction Id is : {{$tranid}}.</div>
            <div class="para text-center mt-4">
                {{ \App\Models\EmailContent::where('title','=','event_email_message')->first()->description }}
            </div>
        </div>
    </div>
</section> 



@endsection

@section('scripts')
@endsection