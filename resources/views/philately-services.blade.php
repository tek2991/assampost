@extends('layouts.app')
@section('title')
    Philately Services
@endsection
@section('content')
    @php
    $services = [
        'Philately' => [
            'My Stamps' => [
                'link' => 'http://postagestamps.gov.in/MyStamp.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Collect Stamps' => [
                'link' => 'https://www.epostoffice.gov.in/Login.aspx?service=Philately',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Commemorative Stamps' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/Commemorative-Stamps-.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Difinitive Stamps' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/Definitive-Stamps.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Buy Stamps' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/Buy-Stamp.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'My Stamp' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/My-Stamp.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Philatelic Deposit Account' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/Philatelic-Deposit-Account.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Deen Dayal SPARSH Yojana' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/Deen-Dayal-SPARSH-Yojana.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'StampCalendar' => [
                'link' => 'https://www.indiapost.gov.in/Philately/Pages/Content/StampCalendar.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
        ],
    ];
    @endphp
    <section id="about" class="about">
        <div class="container">
            @foreach ($services as $name => $products)
                <h3 class="section-header mb-4"> {{ $name }} </h3>

                <div class="mb-4">
                    <ul class="row">
                        @foreach ($products as $title => $product)
                            <li class="col-md-3">
                                <a href="{{ $product['link'] }}" target="_blank">
                                    <h5 class="card-title">{{ $title }}
                                    </h5>
                                </a>
                            </li>
                        @endforeach
                    </ul>


                    {{-- <div class="row">
                    @foreach ($products as $title => $product)
                        <div class="col-md-3 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $title }}</h5>
                                    <a class="black-btn" href="{{ $product['link'] }}" target="_blank"> Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

                </div>
            @endforeach
        </div>
    </section>
@endsection
