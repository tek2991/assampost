<section class="banner">
    <div data-aos="fade-in">
        <div id="banner-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach (App\Models\Banner::where('is_active', 1)->orderBy('updated_at', 'desc')->get() as $banner)
                        <li class="splide__slide">
                            @if ($banner->url != '')
                                <a href="{!! $banner->url !!}" target="_blank">
                            @endif
                            <img src="{{ $banner->banner_image }}" style="width:100%">
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
                        ->orderBy('updated_at', 'desc')
                        ->get();
                @endphp
                @foreach ($notices_front as $n)
                    <li><a href="{{ $n->file_path }}" target="_blank">{{ $n->title }} </a></li>
                @endforeach
            </ul>
        </marquee>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#banner-slider', {
                autoHeight: true,
                type: 'loop',
                autoplay: true,
                interval: '3000',
            }).mount();
        });
    </script>
</section>
