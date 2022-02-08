@extends('layouts.app')
@section('title')
Events
@endsection
@section('content')
    <section class="conact admin">
        <div class="container">
            <div class="services-wrap">
                <div class="row">
                        <div class="col-md-12">
                            <h3>{{$event->title}}</h3><br>
                            <p>{!! $event->description !!}</p>
                        </div>
                </div>
            </div>
          
        </div>
    </section>
@endsection
