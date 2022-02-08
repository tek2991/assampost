@extends('layouts.app')
@section('title')
Administrative Office
@endsection
@section('content')

    <section class="conact admin">
        <div class="container">


            <div class="row">
                <div class="col-md-12">
                @forelse ($offices as $office)
                    <div class="card address-card-1">
                        <div class="card-header">
                            <h5>{{$office->title}}</h5>
                        </div>

                        <div class="card-body">
                            <p class="card-text">
                                {{$office->address_line1}} <br />
                                 {{$office->address_line2}}<br />
                                Ph No. {{$office->phone_no}} <br />
                                Email: {{$office->email}}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        No Office Found
                    </div>
                @endforelse
                    

                   
                </div>


            </div>
            {{$offices->links()}} 
        </div>



        </div>
    </section>

@endsection
