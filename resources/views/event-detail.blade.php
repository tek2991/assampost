@extends('layouts.app')
@section('title')
    Events
@endsection
@section('css')
    <style>
        /* .event-grid {
                                                                                display: grid;
                                                                                grid-template-columns: repeat(6, 1fr);
                                                                                grid-template-rows: repeat(2, 1fr);
                                                                                grid-column-gap: 5px;
                                                                                grid-row-gap: 5px; 
                                                                            }
                                                                            .hovereffect {
                                                                            width: 77%;
                                                                            height: 100%;
                                                                            float: left;
                                                                            overflow: hidden;
                                                                            position: relative;
                                                                            text-align: center;
                                                                            cursor: default;
                                                                        }
                                                                        .hovereffect img {
                                                                            width:140px;
                                                                            height:120px;
                                                                            
                                                                        }
                                                                        .hovereffect .overlay {
                                                                            width: 100%;
                                                                            position: absolute;
                                                                            overflow: hidden;
                                                                            left: 0;
                                                                         top: auto;
                                                                         bottom: 0;
                                                                         padding: 1em;
                                                                         height: 4.75em;
                                                                         background: #79FAC4;
                                                                         color: #3c4a50;
                                                                         -webkit-transition: -webkit-transform 0.35s;
                                                                         transition: transform 0.35s;
                                                                         -webkit-transform: translate3d(0,100%,0);
                                                                         transform: translate3d(0,100%,0);
                                                                         visibility: hidden;

                                                                        }

                                                                        .hovereffect img {
                                                                            display: block;
                                                                            position: relative;
                                                                         -webkit-transition: -webkit-transform 0.35s;
                                                                         transition: transform 0.35s;
                                                                        }

                                                                        .hovereffect:hover img {
                                                                        -webkit-transform: translate3d(0,-10%,0);
                                                                         transform: translate3d(0,-10%,0);
                                                                        }

                                                                        .hovereffect h6 {
                                                                            text-transform: uppercase;
                                                                            color: #fff;
                                                                            text-align: center;
                                                                            position: relative;
                                                                            font-size: 17px;
                                                                            padding: 10px;
                                                                            background: rgba(0, 0, 0, 0.6);
                                                                         float: left;
                                                                         margin: 0px;
                                                                         display: inline-block;
                                                                        }

                                                                        .hovereffect a.info {
                                                                            display: inline-block;
                                                                            text-decoration: none;
                                                                            padding: 7px 14px;
                                                                            text-transform: uppercase;
                                                                         color: #fff;
                                                                         border: 1px solid #fff;
                                                                         margin: 50px 0 0 0;
                                                                         background-color: transparent;
                                                                        }
                                                                        .hovereffect a.info:hover {
                                                                            box-shadow: 0 0 5px #fff;
                                                                        }


                                                                        .hovereffect p.icon-links a {
                                                                         float: right;
                                                                         color: #3c4a50;
                                                                         font-size: 1.4em;
                                                                        }

                                                                        .hovereffect:hover p.icon-links a:hover,
                                                                        .hovereffect:hover p.icon-links a:focus {
                                                                         color: #252d31;
                                                                        }

                                                                        .hovereffect h6,
                                                                        .hovereffect p.icon-links a {
                                                                         -webkit-transition: -webkit-transform 0.35s;
                                                                         transition: transform 0.35s;
                                                                         -webkit-transform: translate3d(0,200%,0);
                                                                         transform: translate3d(0,200%,0);
                                                                         visibility: visible;
                                                                        }

                                                                        .hovereffect p.icon-links a span:before {
                                                                         display: inline-block;
                                                                         padding: 8px 10px;
                                                                         speak: none;
                                                                         -webkit-font-smoothing: antialiased;
                                                                         -moz-osx-font-smoothing: grayscale;
                                                                        }


                                                                        .hovereffect:hover .overlay,
                                                                        .hovereffect:hover h6,
                                                                        .hovereffect:hover p.icon-links a {
                                                                         -webkit-transform: translate3d(0,0,0);
                                                                         transform: translate3d(0,0,0);
                                                                        }

                                                                        .hovereffect:hover h6 {
                                                                         -webkit-transition-delay: 0.05s;
                                                                         transition-delay: 0.05s;
                                                                        }

                                                                        .hovereffect:hover p.icon-links a:nth-child(3) {
                                                                         -webkit-transition-delay: 0.1s;
                                                                         transition-delay: 0.1s;
                                                                        }

                                                                        .hovereffect:hover p.icon-links a:nth-child(2) {
                                                                         -webkit-transition-delay: 0.15s;
                                                                         transition-delay: 0.15s;
                                                                        }

                                                                        .hovereffect:hover p.icon-links a:first-child {
                                                                         -webkit-transition-delay: 0.2s;
                                                                         transition-delay: 0.2s;
                                                                        } */


        /* body {
                                                                          font-family: 'Inconsolata', monospace;
                                                                          margin: 0;
                                                                        }
                                                                        button {
                                                                          cursor: pointer;
                                                                        }
                                                                        #portfolio {
                                                                          width: 100%;
                                                                          min-height: 70vh;
                                                                          background: #ffffff;
                                                                          position: relative;
                                                                          display: grid;
                                                                          grid-template-columns: repeat(6, minmax(100px, 1fr));
                                                                          grid-template-rows: 1fr 1fr;
                                                                          grid-gap: 8px;
                                                                        }
                                                                        .project {
                                                                          position: relative;
                                                                          background: #F2DAD7;
                                                                          overflow: hidden;
                                                                          cursor:zoom-in;
                                                                        }
                                                                        .project img {
                                                                          position: absolute;
                                                                          opacity: 0.9;
                                                                        }
                                                                        .project p {
                                                                          position: absolute;
                                                                          text-align: center;
                                                                          width: 100%;
                                                                          padding: 1em 0;
                                                                          text-transform: uppercase;
                                                                          letter-spacing: 2px;
                                                                          z-index: 3;
                                                                        }
                                                                        .project .grid__title {
                                                                          position: absolute;
                                                                          width: 100%;
                                                                          text-align: center;
                                                                          white-space: nowrap;
                                                                          bottom: 0;
                                                                          font-weight: 100;
                                                                          font-size: 0.8em;
                                                                          z-index: 3;
                                                                          text-transform: uppercase;
                                                                          color: #474545;
                                                                          letter-spacing: 2px;
                                                                        }
                                                                        .project:hover .grid__overlay {
                                                                          transform: translateY(0%);
                                                                        }
                                                                        .grid__overlay {
                                                                          background: rgba(229, 182, 177, 0.9);
                                                                          height: 100%;
                                                                          grid-column: 1 / -1;
                                                                          grid-row: 1 / -1;
                                                                          position: relative;
                                                                          display: grid;
                                                                          justify-items: center;
                                                                          align-items: center;
                                                                          transform: translateY(101%);
                                                                          transition: all 0.3s ease-in-out;
                                                                        }
                                                                        .grid__overlay button {
                                                                          background: none;
                                                                          outline: none;
                                                                          font-weight: 100;
                                                                          letter-spacing: 2px;
                                                                          border: 1px solid #ffffff;
                                                                          color: #ffffff;
                                                                          text-transform: uppercase;
                                                                          padding: 10px;
                                                                        }
                                                                        .grid__overlay button:hover {
                                                                          transition: all 0.3s ease-in-out;
                                                                          background: #ffffff;
                                                                          color: #D1A39E;
                                                                          transform: scale(1.05);
                                                                        }
                                                                        .overlay {
                                                                          position: fixed;
                                                                          background: rgba(71, 69, 69, 0.7);
                                                                          top: 0;
                                                                          right: 0;
                                                                          bottom: 0;
                                                                          left: 0;
                                                                          display: none;
                                                                          z-index: 3;
                                                                        }
                                                                        .overlay.open {
                                                                          display: grid;
                                                                          align-items: center;
                                                                          justify-items: center;
                                                                          grid-gap:20px;
                                                                        }
                                                                        .overlay__inner {
                                                                          background: #ffffff;
                                                                          width: 700px;
                                                                          padding: 20px;
                                                                          position: relative;
                                                                          opacity: 1;
                                                                        }
                                                                        .close {
                                                                          position: absolute;
                                                                          top: 3px;
                                                                          right: 10px;
                                                                          background: none;
                                                                          outline: 0;
                                                                          color: #474545;
                                                                          border: 0;
                                                                          text-transform: uppercase;
                                                                          letter-spacing: 2px;
                                                                        }
                                                                        .close:hover {
                                                                          color: #D1A39E;
                                                                        }
                                                                        .project__image {
                                                                          margin-left: -50%;
                                                                        }

                                                                        .project img:hover {
                                                                            transform: scale(1.2);
                                                                        } */
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

                <div id="event-main-image-slider" class="splide mb-2">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($event->galleryPictures as $image)
                                <li class="splide__slide">
                                    <img style="width: 100%" src="{{ $image->file_path }}">
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
            width: 100%;
            padding-top: 40%;
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
                autoHeight: true,
            });

            var thumbnails = new Splide('#event-thumbnail-image-slider', {
                fixedWidth: 100,
                fixedHeight: 60,
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
