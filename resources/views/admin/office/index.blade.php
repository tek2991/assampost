@extends('admin.layouts.app')
@section('title')
    {{ __('Create Administrative Office') }}
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Administrative Office</h1>
</div>
@endsection
@section('content')
 <div class="row">
 @if(Session::has('success'))
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
                {{-- <i class="fe fe-check mr-2" aria-hidden="true"></i> --}}
                <button type="button" class="close" data-dismiss="alert"></button>
                {!! Session::get('success') !!}
            </div>
        </div>
    </div>
</div>
@endif
 @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
 @endif
 @foreach ($offices as $k=>$office)
    <div class="col-md-3">
        <div class="card position-relative  py-3  border-left-danger">
            <div class="card-body">
               <h6>{{$office->title}}</h6>
                <p>{{$office->address_line1}}</p>
                <p>{{$office->address_line2}}</p>
                <p>{{$office->phone_no}}</p>
            </div>
         </div>
    </div>
@endforeach
{{$offices->links()}}
 </div>           
@endsection
            
     