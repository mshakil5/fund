@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="fundriser">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto p-4">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            
                            <div class="title darkerGrotesque-bold lh-1 fs-1">
                                @if (isset($success))
                                    <span class="login-head" role="alert">
                                        <strong>{!! $success !!}</strong>
                                    </span>
                                @endif
                                @if (isset($error))
                                    <span class="login-head" role="alert">
                                        <strong><p style="color: red">{{ $error }}</p></strong>
                                    </span>
                                @endif
                            </div>
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
    
});


</script>

@endsection