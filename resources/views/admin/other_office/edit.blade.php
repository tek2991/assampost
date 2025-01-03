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
    <div class="row">
        <div class="col-md-8">
            <div class="card position-relative  py-3  border-left-danger">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Update</h6>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
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
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ route('admin.other-office.update', $office->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Administrative Office <span class="mendatory">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select name="office_id" class="form-control">
                                        <option value="">Select Office</option>
                                        @foreach ($offices as $off)
                                            <option value="{{ $off->id }}"
                                                @if ($off->id == $office->office->id) selected @endif>{{ $off->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Division <span class="mendatory">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select name="division_id" class="form-control">
                                        <option value="">Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}"
                                                {{ $office->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Title <span class="mendatory">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                        value="{{ $office->title }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">District <span class="mendatory">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select name="district_id" class="form-control">
                                        <option value="">Select district</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ $office->district_id == $district->id ? 'selected' : '' }}>
                                                {{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Address Line 1 <span class="mendatory">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address_line1" id="address_line1"
                                        placeholder="Address Line 1" value="{{ $office->address_line1 }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Address Line 2</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address_line2" id="address_line2"
                                        placeholder="Address Line 2" value="{{ $office->address_line2 }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Pincode <span class="mendatory">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="pincode" id="address_line2"
                                        placeholder="Pincode" value="{{ $office->pincode }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="latitude_longitude">Latitude & Longitude</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="latitude_longitude"
                                        id="latidute_longitude" value="{{ $office->latitude_longitude }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Phone no</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone_no" id="phone_no"
                                        placeholder="Phone No" value="{{ $office->phone_no }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                        value="{{ $office->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Website / Url</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="url" class="form-control" name="website" id="website"
                                        placeholder="Website" value="{{ $office->website }}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Other Details</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="other_description" id="other_description" rows="5"
                                        class="form-control">{{ $office->other_description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Upload Postman List</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="filename" id="filename">
                                    @if ($office->file_path)
                                        <a href="{{ $office->file_path }}" target="_blank"
                                            class="btn btn-primary btn-sm">View File</a>
                                    @endif
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
