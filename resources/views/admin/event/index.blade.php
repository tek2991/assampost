@extends('admin.layouts.app')
@section('title')
    {{ __('Manage / Edit Events') }}
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Manage Events</h1>
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
<div class="container">
<form action="" method="get" enctype="multipart/form-data">
    <div class="row">

            <div class="col-lg-1">
                Title
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="Search">
            </div>
            <div class="col-lg-1">
                <button type="submit" class="btn btn-primary btn-sm" id="search_btn">Search</button>
            </div>

    </div>
    </form>
</div>
<table class="table">
<thead>
<th>#</th>
<th>Title</th>
<th>Category</th>
<th>Action</th>
</thead>
<tbody>

@forelse ($events as $k=>$event)
    <tr>
    <td>{{$events->firstItem()+$k}}</td>
    <td>{{$event->title}}</td>
    <td>{{$notice->category->name}}</td>
    <td>
    <a href="{{route('admin.event.edit',$event->id)}}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i> Edit</a>
    <form action="{{route('admin.event.destroy',$event->id)}}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete')"><i class="fa fa-trash"></i> Delete</button>
    </form>
    @if($event->is_active==1)
   <form action="{{route('admin.event.unpublish',$event->id)}}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Unpublish</button>
    </form>
    @else
    <form action="{{route('admin.event.publish',$event->id)}}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-times"></i> Publish</button>
    </form>
    @endif
    </td>
    </tr>
@empty
    <tr>
    <td colspan="3">No Events</td>
    </tr>
@endforelse
</tbody>
</table>
 </div>
 {{$events->links()}}
@endsection

