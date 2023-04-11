<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FOR SEO -->
    <!-- <meta property='og:title' content='MarinOne soft'/>
    <meta property='og:image' content='./assets/images/link.jpg'/> 
    <meta property='og:description' content='DESCRIPTION OF YOUR SITE'/>
    <meta property='og:url' content='URL OF YOUR WEBSITE'/>
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='627' />
    <meta property="og:type" content='website'/> -->

    <title>Donation</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.1.3min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="./css/slick.css" />
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css" /> -->
</head>

<body>
    <!-- oncontextmenu="return false;" -->
    


    @include('frontend.inc.header')
    
    @yield('content')

    @include('frontend.inc.footer') 






    <script src="{{ asset('assets/js/jquery-2.2.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap-5.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/iconify.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
    <!-- <script src="./js/slick.min.js" type="text/javascript"></script> -->
    <script>
        for (var i = 0; i < document.links.length; i++) {
            if (document.links[i].href === document.URL) {
                document.links[i].className = 'nav-link current';
            }
        }
    </script>

    <script>
        // page schroll top
        function pagetop() {
            window.scrollTo({
                top: 130,
                behavior: 'smooth',
            });
        }
        function success(msg){
            $.notify({
                    // title: "Update Complete : ",
                    message: msg,
                    // icon: 'fa fa-check'
                },{
                    type: "info"
                });
            }
        function warning(msg){
            $.notify({
                    // title: "Update Complete : ",
                    message: msg,
                    // icon: 'fa fa-check'
                },{
                    type: "warning"
            });
        }
       function dlt(){
                swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
                    }, function(isConfirm) {
                    if (isConfirm) {
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");

                    }
            });
       }
    </script>

<script type="text/javascript" src="{{asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/sweetalert.min.js')}}"></script>
@yield('script')
</body>
</html>