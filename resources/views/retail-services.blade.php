@extends('layouts.app')
@section('title')
    Retail Services
@endsection
@section('content')
    @php
    $services = [
        'Retail Services' => [
            'Retail Post' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/Retail-Post.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'AADHAR Enrollment and Updation' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/AadhaarUpdationCentres.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            '​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​Gangajal​' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/GangajalServices.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Post Office Passport Seva Kendra (POPSK)' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/POPSK.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Holy Blessings' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/holy_blessing.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg',
            ],
            'Passenger Reservation System (PRS)' => [
                'link' => 'https://www.indiapost.gov.in/MBE/Pages/Content/IPPRS.aspx',
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
