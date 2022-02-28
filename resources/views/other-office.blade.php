@extends('layouts.app')
@section('content')
    <section class="conact admin">
        <div class="container">
            <h3 class="section-header">All Offices</h3>
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('view-other-office') }}" method="GET">
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
                                                placeholder="Name or pincode" value="{{ $request->search }}">
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
                                                <option value="">All</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}"
                                                        {{ $request->division_id == $division->id ? 'selected' : '' }}>
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
                                                <option value="">All</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $request->district_id == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="district_id" style="padding-top:5px">Parent</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="admin_office_id" class="form-control" id="district_id">
                                                <option value="">All</option>
                                                @foreach ($admin_offices as $admin_office)
                                                    <option value="{{ $admin_office->id }}"
                                                        {{ $request->admin_office_id == $admin_office->id ? 'selected' : '' }}>
                                                        {{ $admin_office->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="secondary-btn btn btn-sm">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    @forelse ($offices as $key => $office)
                        @php
                            $lat_lng = $office->latitude_longitude ? $office->latitude_longitude : null;
                            $query = str_replace([' ', ','], ['+', ''], $office->address_line1);
                            $google_maps_url = "https://maps.google.com/maps/search/?api=1&query=$query";
                            if ($lat_lng) {
                                $google_maps_url = "https://maps.google.com/maps/search/?api=1&query=$query&query=$lat_lng";
                            }
                        @endphp
                        <div class="card mb-2">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>{{ $key + 1 }}. {{ $office->title }}
                                    <i>({{ $office->office->title }}, {{ $office->division->name }})</i></span>
                                <span>
                                    @if ($office->file_path)
                                        <span>
                                            <a href="{{ $office->file_path }}" target="_blank">
                                                Postman list
                                                <span class="material-icons" style="vertical-align: bottom !important;">
                                                    download
                                                </span>
                                            </a>
                                            <span class="px-4"></span>
                                        </span>
                                    @endif
                                    <a href="{{ $google_maps_url }}" target="_blank">
                                        Map
                                        <span class="material-icons" style="vertical-align: bottom !important;">
                                            place
                                        </span>
                                    </a>
                                </span>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">

                                    <li class="d-flex justify-content-between align-items-center">
                                        <span><strong>Address:</strong> {{ $office->address_line1 }},
                                            {{ $office->address_line2 }}, {{ $office->pincode }}
                                        </span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span><strong>District: </strong> {{ $office->district->name }}
                                        </span>
                                        <span><strong>Phone: </strong>
                                            {{ $office->phone_no ? $office->phone_no : 'N/A' }}
                                        </span>
                                        <span><strong>Email: </strong>
                                            {{ $office->email ? $office->email : 'N/A' }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="card address-card-2">
                            <div class="card-body">
                                <h5>No Office Found</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
                {{ $offices->links() }}
            </div>
        </div>
    </section>
@endsection
