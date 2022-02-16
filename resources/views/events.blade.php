@extends('layouts.app')
@section('title')
    Events
@endsection
@section('content')
    <section class="conact admin">
        <div class="container">
            <div class="row mb-4">
                <h3 class="section-header">Events</h3>
            </div>
            <div class="services-wrap">
                <div class="row">
                    @forelse ($events as $event)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ $event->picture }}" class="card-img-top" alt="{{ $event->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    <p class="card-text">{!! $event->brief_description !!}</p>
                                    <a href="{{ route('event.detail', $event->slug) }}" class="btn black-btn">Details</a>
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
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
