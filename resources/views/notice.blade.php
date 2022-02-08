
@extends('layouts.app')
@section('content')
    <section class="notice-section">
        <div class="container">
            <div class="notification-wrapper">
                @forelse($notices as $key => $notice)
                 <div class="notice-block d-flex justify-content-between">

                    <div class="info">
                        <h5>{{$notice->title}}</h5>
                        <h6>Cateogory: Tender Notice</h6>
                    </div>

                    <div class="action">
                        <a class="black-btn" href="{{$notice->file_path}}" target="_blank"> View </a>
                    </div>
                </div>
                @empty
                    <h3>No Notice Found</h3>
                    
                @endforelse
            {{ $notices->links() }}
            </div>

        </div>
    </section>
@endsection
