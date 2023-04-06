<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-5.1.3min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css')}}">
    {{--  datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <div class="dashboard-wraper">
        <div class="sidebar " id="sidebar">
            <div class="brand">
              <a href="{{ route('homepage')}}"><img src="{{ asset('assets/admin/images/logo.svg')}}" width="114px" class="mx-auto" alt="logo"></a>
                
            </div>
            <ul class="navigation">
                <li><a href="index.html" class="nav-link current">Dashboard</a></li>
                <li><a href="make-a-donation.html">Make a donation</a></li>
                <li><a href="order-voucher-books.html">Order voucher books</a></li>
                <li><a href="tevini-card.html">Tevini card</a></li>
                <li><a href="view-transactions.html">View transactions</a></li>
                <li><a href="standing-orders.html">Standing orders</a></li>
                <li><a href="maaser-calculator.html">Maaser calculator</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="bottom-part">
                <a href="#" class="btn-theme bg-secondary">Order voucher books</a>
                <a href="#" class="btn-theme bg-primary">Make a donation</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mt-2 d-flex justify-content-center txt-theme fw-bold align-items-center">
                    <iconify-icon icon="humbleicons:logout"></iconify-icon>
                    &nbsp;Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
            </div>
            <div class="collapsable" onclick="collaps();">
                <iconify-icon class="icon" icon="octicon:sidebar-collapse-24"></iconify-icon>
            </div>
        </div>


        @yield('content')

    </div>
    </div>


    <script src="{{ asset('assets/admin/js/bootstrap-5.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/iconify.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/app.js')}}"></script>
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