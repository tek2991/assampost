@extends('admin.layouts.app')
@section('title')
    {{ __('Manage / Edit links') }}
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Manage links</h1>
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
<th>Url</th>
<th>Action</th>
</thead>
<tbody>

@forelse ($links as $k=>$link)
    <tr>
    <td>{{$links->firstItem()+$k}}</td>
    <td>{{$link->title}}</td>
    <td>{{$notice->category->name}}</td>
    <td>{{$link->url}}</td>
    <td>
    <a href="{{route('admin.link.edit',$link->id)}}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i> Edit</a>
    <form action="{{route('admin.link.destroy',$link->id)}}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete')"><i class="fa fa-trash"></i> Delete</button>
    </form>
    @if($link->is_active==1)
   <form action="{{route('admin.link.unpublish',$link->id)}}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Unpublish</button>
    </form>
    @else
    <form action="{{route('admin.link.publish',$link->id)}}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-times"></i> Publish</button>
    </form>
    @endif
    </td>
    </tr>
@empty
    <tr>
    <td colspan="3">No links</td>
    </tr>
@endforelse
</tbody>
</table>
 </div>
 {{$links->links()}}
@endsection

