@extends('layouts.app')
@section('title')
    Banking & Insurance
@endsection
@section('content')
    @php
    $services = [
        'Business' => [
            'Book Now Pay Later (BNPL)' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/BNPL.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Bill Mail' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Bill-Mail.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Direct Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Direct-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Retail Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Retail-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Business Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Business-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'e-Payment' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/e-Payment.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'e-Post' => [
                'link' => 'https://www.epostoffice.gov.in/',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Parcel' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Parcel.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Cash on Delivery(COD)' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/COD.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Media Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Media-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Speed Post Discount Structures' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Speed-Post-Discount-Structures.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
        ],
    ];
    @endphp
    <section id="about" class="about">
        <div class="container">
            @foreach ($services as $name => $products)
                <h3 class="section-header mb-4"> {{ $name }} </h3>

                <div class="services-wrap mb-5">
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
