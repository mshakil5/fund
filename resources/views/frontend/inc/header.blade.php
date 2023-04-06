<section class="siteHeader ">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light py-0 ">
                <a class="navbar-brand" href="{{ route('homepage')}}">
                    <img src="{{ asset('assets/images/logo.png')}}" class="py-2 img-fluid mx-auto" width="200px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto navCustom">
                        <!-- "me-auto" for left align | "ms-auto" for right align | "mx-auto" for center align--->


                        <li class="nav-item">
                            <a class="nav-link" href="./about.html">About </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./how-we-works.html">how we works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.html">Contact </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownItem" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Fundraisers
                            </a>
                            <ul class="dropdown-menu border-0 shadow-lg " aria-labelledby="dropdownItem">
                                <li><a class="dropdown-item" href="non-profit.html">Non Profit</a></li>
                                <li><a class="dropdown-item" href="for-individual.html">For Individual</a></li>
                            </ul>
                        </li>

                        

                        @if (Auth::user())
                            @if (Auth::user()->is_type == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="dropdownItem"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="https://via.placeholder.com/510x440.png" class="img-fluid  rounded"
                                            width="45px" />
                                        <span class="ms-2"> Admin </span>
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow-lg " aria-labelledby="dropdownItem">
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard')}}">Dashboard </a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="dropdownItem"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="https://via.placeholder.com/510x440.png" class="img-fluid  rounded"
                                            width="45px" />
                                        <span class="ms-2"> my account </span>
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow-lg " aria-labelledby="dropdownItem">
                                        <li><a class="dropdown-item" href="/user-campaign.html">Your campaign </a></li>
                                        <li><a class="dropdown-item" href="/user-donation.html">Donation you have made</a></li>
                                        <li><a class="dropdown-item" href="/fundriser.html">Start a new fundrising</a></li>
                                        <li><a class="dropdown-item" href="/all-transaction.html">All Statements</a></li>
                                        <li><a class="dropdown-item" href="/user-profile.html">account
                                                settings</a>
                                            </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login </a>
                        </li>
                        @endif

                        



                    </ul>
                </div> 
            </nav>

        </div>
    </div>
</section>