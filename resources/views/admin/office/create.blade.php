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
    <div class="col-md-8">
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
                <form action="{{route('admin.office.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Title <span class="mendatory">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Address Line 1</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address_line1" id="address_line1" placeholder="Address Line 1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Address Line 2</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address_line2" id="address_line2" placeholder="Address Line 2">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Phone no</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Website / Url</label>
                            </div>
                            <div class="col-md-9">
                                <input type="url" class="form-control" name="url" id="email" placeholder="Url">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Other Details</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="other_description" id="other_description"  rows="5" class="form-control"></textarea>
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
            
     