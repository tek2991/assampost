@extends('layouts.app')
@section('title')
    Downloads
@endsection
@section('content')
    <section class="conact admin">
        <div class="container">


            <div class="row">
                <div class="col-md-12">

                    <div class="card resources-card-1">

                        <div class="card-header">
                            <h5>Downloads</h5>
                        </div>

                        <div class="card-body">
                            <div class="card-text">
                                @forelse($downloads as $key => $download)
                                    <div class="download-item">
                                    <h2> {{$download->title}} </h2>
                                    <h3> Filename : {{$download->filename}}</h3>
                                    <a href="{{$download->file_path}}" class="black-btn" target="_blank">Download</a>
                                </div>
                                @empty
                                    <p>No downloads available</p>
                                    
                                @endforelse
                                

                                {{ $downloads->links() }}
                            </div>
                        </div>

                    </div>

                   

                </div>


            </div>
        </div>



        </div>
    </section>
@endsection
