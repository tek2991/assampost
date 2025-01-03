<!-- ======= Header ======= -->
<header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="site-title">
                            <h5>Department of Posts India</h5>
                            <h1>Assam Postal Circle</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-xl-block">
                    <div class="d-flex align-items-end justify-content-end">
                        <a class="secondary-btn mb-3"
                            href="https://www.indiapost.gov.in/vas/pages/LocatePostOffices.aspx"
                            style="margin-right: 20px;" target="_blank"> Locate Post Office </a>
                        <a class="primary-btn mb-3"
                            href="https://www.indiapost.gov.in/_layouts/15/DOP.Portal.Tracking/TrackConsignment.aspx"
                            target="_blank"> Track Consignment </a>
                        <div class="logo">
                            <a href="https://amritmahotsav.nic.in/" target="_blank">
                                <img src="{{ asset('assets/img/g20.jpg') }}" alt="" class="img-fluid" style="padding:1rem;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container d-flex align-items-center justify-content-between">
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Appointments</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('book-appointment') }}" class="text-white">Book new appointment</a></li>
                            <li><a href="{{ route('search-appointment') }}" class="text-white">Check bookings</a></li>
                            {{-- IF logged in --}}
                            @if (Auth::check())
                                <li><a href="{{ route('manage-appointment') }}" class="text-white">Manage appointments</a></li>
                            @endif
                        </ul>
                    </li>
                    {{-- <li class="dropdown">
                        <a href="#"><span>Virtual Exhibitions</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{env('APP_URL')}}/exhibition/guwahati-exhibition/" class="text-white">Virtual Philatelic
                                    Exhibition Guwahati 2021-22</a></li>
                            <li><a href="{{env('APP_URL')}}/exhibition/sivasagar-exhibition/" class="text-white">Virtual Philatelic
                                    Exhibition Sivasagar 2021-22</a></li>
                        </ul>
                    </li> --}}
                    <li class="dropdown">
                        <a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('/mail-services') }}" class="text-white">Mail Services</a></li>
                            <li><a href="{{ url('/banking-services') }}" class="text-white">Banking &amp; Insurance</a></li>
                            <li><a href="{{ url('/business-services') }}" class="text-white">Business Services</a></li>
                            <li><a href="{{ url('/retail-services') }}" class="text-white">Retail Services</a></li>
                            <li><a href="{{ url('/philately-services') }}" class="text-white">Philately</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#"><span>Offices</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('/administrative-office') }}" class="text-white">Administrative</a></li>
                            <li><a href="{{ url('/other-office') }}" class="text-white">All Offices</a></li>
                        </ul>
                    </li>
                    {{-- <li><a class="nav-link scrollto" href="{{ url('/event') }}">Events</a></li> --}}
                    {{-- <li><a class="nav-link scrollto" href="{{ url('/event') }}">Events</a></li> --}}
                    <li><a class="nav-link scrollto " href="{{ url('/notice') }}">Notices</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('/download') }}" class="text-white">Downloads</a></li>
                            <li><a href="{{ url('/links') }}" class="text-white">Links</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="{{ url('/about') }}">About</a></li>
					<li class="d-block d-sm-none"><a class="nav-link scrollto" href="https://www.indiapost.gov.in/vas/pages/LocatePostOffices.aspx">Locate Post Office</a></li>
					<li class="d-block d-sm-none"><a class="nav-link scrollto" href="https://www.indiapost.gov.in/_layouts/15/DOP.Portal.Tracking/TrackConsignment.aspx">Track Consignment</a></li>
                </ul>
				<i class="bi bi-list mobile-nav-toggle" style="color: #fff;"></i>
            </nav><!-- .navbar -->
        </div>
    </div>
</header>
<!-- End Header -->
