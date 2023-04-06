<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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

    <!--  <script>
        document.onkeydown = function(e) {
          if (e.ctrlKey && e.keyCode === 85) { 
             alert("you cant get my code ever :)");
             return false;
          }
        };
       </script> -->

</body>

</html>