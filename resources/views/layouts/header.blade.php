<!-- ======= Header ======= -->
	<header id="header" class="">

		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="d-flex align-items-center">
							<div class="logo">
								<a href="{{ url('/')}}">
									<img src="assets/img/logo.png" alt="" class="img-fluid">
								</a>
							</div>

							<div class="site-title">
								<h5>Department of Posts India</h5>
								<h1>Assam Postal Circle</h1>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="d-flex justify-content-between action-btn-wrap">
							<a class="secondary-btn" href="https://www.indiapost.gov.in/vas/pages/LocatePostOffices.aspx" target="_blank"> Locate Post Office </a>
							<a class="primary-btn" href="https://www.indiapost.gov.in/_layouts/15/DOP.Portal.Tracking/TrackConsignment.aspx" target="_blank"> Track Consignment </a>
						</div>	
					</div>
				</div>	
			</div>
		</div>

		<div class="header-bottom">
			<div class="container d-flex align-items-center justify-content-between">

				<nav id="navbar" class="navbar">
					<ul>
						<li><a class="nav-link scrollto active" href="{{ url('/')}}">Home</a></li>
                        
						<li class="dropdown">
							<a href="#"><span>Virtual Exhibitions</span> <i class="bi bi-chevron-down"></i></a>
							<ul>
								<li><a href="{{ url('/exhibition/guwahati-exhibition') }}">Guwahati Exhibition</a></li>
								<li><a href="{{ url('/exhibition/jorhat-exhibition') }}">Jorhat Exhibition</a></li>
							</ul>
						</li>
	

						<li class="dropdown">
							<a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
							<ul>
								<li><a href="{{ url('/mail-services') }}">Mail Services</a></li>
								<li><a href="{{ url('/banking-services') }}">Banking &amp; Insurance</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#"><span>Offices</span> <i class="bi bi-chevron-down"></i></a>
							<ul>
								<li><a href="{{ url('/administrative-office') }}">Administrative</a></li>
								<li><a href="{{ url('/other-office') }}">All Offices</a></li>
							</ul>
						</li>
						<li><a class="nav-link scrollto" href="{{ url('/event') }}">Events</a></li>
						<li><a class="nav-link scrollto " href="{{ url('/notice') }}">Notices</a></li>
						<li class="dropdown">
							<a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
							<ul>
								<li><a href="{{ url('/downloads') }}">Download</a></li>
								<li><a href="{{ url('/links') }}">Links</a></li>
							</ul>
						</li>
						<li><a class="nav-link scrollto" href="{{ url('/about')}}">About</a></li>
					</ul>
					<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

</div>
</div>	
</header>
<!-- End Header -->