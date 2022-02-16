<section class="banner">
    <div data-aos="fade-in">
        <div id="image-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @php
                        $banners = DB::table('banners')
                            ->where('is_active', 1)
                            ->get();
                    @endphp
                    @foreach ($banners as $banner)
                        <li class="splide__slide">
                            @if ($banner->url != '')
                                <a href="{{ $banner->url }}" target="_blank">
                            @endif
                            <img src="{{ $banner->banner_image }}">
                            @if ($banner->url != '')
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <div class="notification">
        <marquee direction="left">
            <ul>
                @php
                    $notices_front = DB::table('notices')
                        ->where('is_active', 1)
                        ->where('publish_to_scroll', 1)
                        ->get();
                @endphp
                @foreach ($notices_front as $n)
                    <li><a href="{{ $n->file_path }}" target="_blank">{{ $n->title }} </a></li>
                @endforeach
            </ul>
        </marquee>
    </div>

</section>
