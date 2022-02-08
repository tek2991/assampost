@extends('layouts.app')
@section('title')
    Links
@endsection
@section('content')
    <section class="conact admin">
        <div class="container">


            <div class="row">
                <div class="col-md-12">

                    <div class="card resources-card-1">

                        <div class="card-header">
                            <h5>Links</h5>
                        </div>

                        <div class="card-body">
                            <div class="card-text">
                                @forelse($links as $key => $link)
                                    <div class="download-item">
                                    <h2> {{$link->title}} </h2>
                                    <h3> Url : <a href="{{$link->url}}" target="_blank">{{$link->url}}</a></h3>
                                </div>
                                @empty
                                    <p>No link available</p>
                                    
                                @endforelse
                                

                                {{ $links->links() }}
                            </div>
                        </div>

                    </div>

                   

                </div>


            </div>
        </div>



        </div>
    </section>
@endsection
