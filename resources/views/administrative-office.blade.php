@extends('layouts.app')
@section('title')
    Administrative Office
@endsection
@section('content')

    <section class="conact admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('view-administrative-office') }}" method="GET">
                        <div class="card">
                            <div class="card-header">
                                <h5>Filters</h5>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="search" style="padding-top:5px">Search</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="name or Pincode" value="{{ $request->search }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="division_id" style="padding-top:5px">Division</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="division_id" class="form-control" id="division_id">
                                                <option value="">Select Division</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}" {{ $request->division_id == $division->id ? 'selected' : '' }}>
                                                        {{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="district_id" style="padding-top:5px">District</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="district_id" class="form-control" id="district_id">
                                                <option value="">Select district</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}" {{ $request->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Submit</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    @forelse ($offices as $office)
                        <div class="card address-card-1">
                            <div class="card-header">
                                <h5>{{ $office->title }}</h5>
                            </div>

                            <div class="card-body">
                                <p class="card-text">
                                    {{ $office->address_line1 }} <br />
                                    {{ $office->address_line2 }}<br />
                                    Ph No. {{ $office->phone_no }} <br />
                                    Email: {{ $office->email }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            No Office Found
                        </div>
                    @endforelse



                </div>


            </div>
            {{ $offices->links() }}
        </div>



        </div>
    </section>

@endsection
