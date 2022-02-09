@extends('admin.layouts.app')
@section('title')
{{ __('Manage / Edit links') }}
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Catgory</h1>
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
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @forelse ($categories as $key=>$category)
                        <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                        <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i> Edit</a>
                        <form action="{{route('admin.category.destroy',$category->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete')"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        </td>

                    @empty
                        <tr>
                            <td colspan="3">No data found</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
