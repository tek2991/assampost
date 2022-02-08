@extends('layouts.app')
@section('title')
Other Office
@endsection
@section('content')

    <section class="conact admin">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    @forelse ($offices as $office)
                    <div class="card address-card-2">
                        <div class="card-body">
                            <h5>Office Name: {{$office->title}}</h5>
                            <p class="card-text">
                            Parent Office: {{$office->office->title}} <br/>
                                {{$office->address_line1}} <br />
                                {{$office->address_line2}} <br />
                                Ph No. {{$office->phone_no}} <br />
                                Email: {{$office->email}}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="card address-card-2">
                        <div class="card-body">
                            <h5>No Office Found</h5>
                        </div>
                    @endforelse
                       
                </div>
            </div>
            {{$offices->links()}} 

        </div>
        </div>
    </section>

@endsection
