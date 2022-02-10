@extends('admin.layouts.app')
@section('title')
    {{ __('Create New Notice') }}
@endsection
@section('css')
<style>
.ck-editor__editable_inline {
    min-height: 500px;
 }
 </style>
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Notice Section</h1>
</div>
@endsection
@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="card position-relative  py-3  border-left-danger">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Create</h6>
            </div>
            <div class="card-body">
            @if(Session::has('error'))
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                            {{-- <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> --}}
                            <button type="button" class="close" data-dismiss="alert"></button>
                            {!! Session::get('error') !!}
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
                <form action="{{route('admin.notice.update',$notice->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Title <span class="mendatory">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required value="{{$notice->title}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Category <span class="mendatory">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $notice->category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">File</label>
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="filename" id="filename">
                                @if($notice->file_path)
                                <a href="{{$notice->file_path}}" target="_blank" class="btn btn-primary btn-sm">View File</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Publish to Scroll </label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" name="publish_to_scroll" id="publish_to_scroll" @if($notice->publish_to_scroll == 1) checked @endif value="1"> Publish to Scroll
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Update</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
         </div>
    </div>
 </div>
@endsection

