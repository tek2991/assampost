@extends('layouts.app')
@section('title')
    {{ $event->title }}
@endsection
@section('css')
    <style>
        .container1 {
            display: flex;
            width: 100%;
            padding: 4% 2%;
            box-sizing: border-box;
            height: 50%;
        }

        .box {
            flex: 1;
            overflow: hidden;
            transition: .5s;
            margin: 0 2%;
            box-shadow: 0 20px 30px rgba(0, 0, 0, .1);
            line-height: 0;
        }

        .box>img {
            width: 100%;
            height: calc(100% - 5vh);
            object-fit: cover;
            transition: .5s;
        }

        .box>span {
            font-size: 3.8vh;
            display: block;
            text-align: center;
            height: 5vh;
            line-height: 2.6;
        }

        .box:hover {
            flex: 1 1 50%;
        }

        .box:hover>img {
            width: 100%;
            height: 100%;
        }

    </style>
@endsection
@section('content')
    <section class="conact admin">
        <div class="container">
            <div class="row mb-4">
                <h3 class="section-header"> {{ $event->title }} </h3>

                <div class="py-3">
                    <div class="event-picture"></div>
                    <div class="my-4">
                        {!! $event->description !!}
                    </div>
                </div>

                <h3 class="section-header my-4"> Gallery </h3>

                <div id="event-main-image-slider" class="splide mb-2 col-md-8 offset-md-2">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($event->galleryPictures as $image)
                                <li class="splide__slide">
                                    <img src="{{ $image->file_path }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="event-thumbnail-image-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($event->galleryPictures as $image)
                                <li class="splide__slide">
                                    <img src="{{ $image->file_path }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .event-picture {
            background-image: url('{{ $event->picture }}');
            background-size: cover;
            background-position: center;
            width: 100%;
            padding-top: 50%;
            margin: auto;
        }

        .splide__slide {
            opacity: 0.3;
        }

        .splide__slide.is-active {
            opacity: 1;
        }

    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var main = new Splide('#event-main-image-slider', {
                type: 'fade',
                rewind: true,
                pagination: false,
                arrows: false,
                fixedHeight: '550px',
                autoWidth: true,
                cover: true,
                breakpoints: {
                    600: {
                        fixedHeight: '200px',
                    },
                },
            });

            var thumbnails = new Splide('#event-thumbnail-image-slider', {
                fixedWidth: 150,
                fixedHeight: 90,
                gap: 10,
                rewind: true,
                pagination: false,
                cover: true,
                focus: 'center',
                isNavigation: true,
                breakpoints: {
                    600: {
                        fixedWidth: 60,
                        fixedHeight: 44,
                    },
                },
            });

            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });
    </script>
@endsection
@section('scripts')
@endsection
