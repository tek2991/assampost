@extends('layouts.app')
@section('title')
Events
@endsection
@section('content')
    <section class="conact admin">
        <div class="container">
            <div class="services-wrap">
                <div class="row">
                    @forelse ($events as $event)
                        <div class="col-md-4">
                        <div class="card event-card-1">

                            <div class="card-header">
                                <img class="img-fluid" src="{{$event->picture}}" alt="{{ $event->title}}">
                            </div>

                            <div class="card-body">

                                <h3> {{ $event->title}}</h3>

                                <p>{!! $event->brief_description !!}</p>

                                <a href="{{route('event.detail',$event->slug)}}" class="black-btn"> Details</a>

                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-md-12">
                            <div class="card event-card-1">
                                <div class="card-body">
                                    <h3>No Events</h3>
                                </div>
                            </div>
                        </div>
                        
                    @endforelse
                    
                    
                </div>
            </div>
            {{$events->links()}}
        </div>
    </section>
@endsection
