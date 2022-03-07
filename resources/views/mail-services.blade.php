@extends('layouts.app')
@section('title')
    Mail Services
@endsection
@section('content')
    @php
    $services = [
        'Premium' => [
            'Speed Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Speed-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Business Parcel' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Business-Parcel-New.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Logistic Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Logistic-Post-New.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
        ],

        'Domestic' => [
            'Letter' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Letter.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Blind Literature Packet' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Blind-Literature-Packet.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Inland Letter Card' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Inland-Letter-Card.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Insurance' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Insurance.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Post Card' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Post-Card.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Registration' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Registration.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Value Payable Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Value-Payable-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Surface Air Lifted' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Surface-Air-Lifted.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Book Packet' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Book-Packet.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Registered Newspaper' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Registered-Newspaper.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Parcel' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Parcel.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
        ],

        'International' => [
            'Letter' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Letter.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Parcel' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Parcel.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'EMS Speed Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/EMS-Speed-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'International Air Parcels' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/International-Air-Parcels.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'International Tracked Packet' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/International-Tracked-Packet.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Information on Custom Matters' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Information-on-Custom-Matters.aspx',
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
