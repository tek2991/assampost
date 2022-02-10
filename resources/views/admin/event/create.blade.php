@extends('admin.layouts.app')
@section('title')
    {{ __('Create New Event') }}
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
<h1 class="h3 mb-0 text-gray-800">Event Section</h1>
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
                <form action="{{route('admin.event.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Title <span class="mendatory">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
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
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Picture</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="picture" id="picture">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Brief Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="brief_description" id="brief_description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description" placeholder="Enter the Description" name="description"></textarea>
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
                                <span class="text">Submit</span>
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

@section('scripts')
@include('ckfinder::setup')
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
     CKEDITOR.replace( 'description', {
        removePlugins: 'sourcearea',
        filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
        filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
        filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123",
        filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",
        filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
        filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
        height: 350,
    }); 
    </script>
@endsection
            
     