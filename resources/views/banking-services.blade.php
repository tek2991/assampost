@extends('layouts.app')
@section('title')
    Banking & Insurance
@endsection
@section('content')
    @php
    $services = [
        'Banking & Remittance' => [
            'Post Office Savings Scheme' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/Post-Office-Saving-Schemes.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Mutual Funds' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/Mutual-Funds.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Jansuraksha Scheme' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/content/JansurakshaScheme.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Money Order' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/Money-Order.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'National Pension Scheme (NPS)' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/NPS.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Electronic Clrearance Service' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/ECS.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'IFS Money Order' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/IFS.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Instant Money Order (IMO)' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/IMO.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'International Money Transfer' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/IMT.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Money Remittance Services' => [
                'link' => 'https://www.indiapost.gov.in/Financial/Pages/Content/Money-Remittance-Services.aspx',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
        ],

        'Insurance' => [
            'Postal Life Insurance (PLI)' => [
                'link' => 'http://www.postallifeinsurance.gov.in/',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'Rural Postal Life Insurance' => [
                'link' => 'http://www.postallifeinsurance.gov.in/',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
            'PLI - Customer Portal' => [
                'link' => 'https://pli.indiapost.gov.in/CustomerPortal/PSLogin.action',
                'image' => 'https://i.imgur.com/hApuNmY.jpg'
            ],
        ]
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
