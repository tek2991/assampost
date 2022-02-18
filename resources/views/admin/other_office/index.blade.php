@extends('admin.layouts.app')
@section('title')
    {{ __('Create Other Office') }}
@endsection
@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Other Office</h1>
    </div>
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
            <button type="button" class="close" data-dismiss="alert"></button>
            {!! Session::get('success') !!}
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <div class="row">
        @foreach ($otherOffices as $k => $office)
            <div class="col-md-3">
                <div class="card position-relative  py-3  border-left-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title text-center">{{ $office->title }}</h5>
                            </div>
                        </div>
                        <h6>{{ $office->office ? $office->office->title : 'Not Available' }}</h6>
                        <p>{{ $office->address_line1 }}</p>
                        <p>{{ $office->address_line2 }}</p>
                        <p>{{ $office->phone_no }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.other-office.edit', $office->id) }}"
                                    class="btn btn-primary btn-block btn-sm"><i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('admin.other-office.destroy', $office->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block  btn-sm"
                                        onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <h6>{{$office->office ? $office->office->title : 'Not Available'}}</h6>
                <p>{{$office->address_line1}}</p>
                <p>{{$office->address_line2}}</p>
                <p>{{$office->phone_no}}</p>
                @if($office->file_path)
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{$office->file_path}}" target="_blank">File url:  <a href="{{$office->file_path}}" target="_blank">{{$office->file_path}}</a></a>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.other-office.edit',$office->id)}}" class="btn btn-primary btn-block btn-sm"><i class="fa fa-edit"></i></a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('admin.other-office.destroy',$office->id)}}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block  btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>


            </div>
        @endforeach
    </div>
<<<<<<< HEAD
@endforeach

 </div>
 {{$otherOffices->links()}}
@endsection

=======
    {{ $otherOffices->links() }}
@endsection
>>>>>>> 8a91b1d6bd1a869b80bd0191a4f83888cbc11fad
