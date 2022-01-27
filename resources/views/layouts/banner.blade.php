<section class="banner">
    <div data-aos="fade-in">
        <div class="banner bg-custom">
            {{-- <img src="{{ asset('assets/img/postal-banner.JPG') }}" alt="" class="img-fluid"> --}}
        </div>

    </div>
    <div class="notification">
        <marquee direction="left">
            <ul>
                <li><a href="#">Virtual Philately Exhibition by Guwahati Division from ___________ Click Here to visit***</a></li>
            </ul>
        </marquee>
    </div>
    <style>
        .bg-custom {
            background-image: url({{ asset('assets/img/postal-banner.JPG') }});
            background-size: cover;
			background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 0;
            padding-top: 25%

        }

    </style>
</section>