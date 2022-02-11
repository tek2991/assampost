@extends('layouts.app')
@section('title')
    Links
@endsection
@section('content')

    <section class="conact admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('view-link') }}" method="GET">
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
                                                placeholder="By name" value="{{ $request->search }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="division_id" style="padding-top:5px">Category</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="">Select category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $request->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top:1rem">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="order_by" style="padding-top:5px">Order</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="order_by" class="form-control" id="order_by">
                                                <option value="desc" {{ $request->order_by == 'desc' ? 'selected' : '' }}>
                                                    Newest first</option>
                                                <option value="asc" {{ $request->order_by == 'asc' ? 'selected' : '' }}>
                                                    Oldest first</option>
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
                    @forelse ($links as $key => $link)
                        <div class="card address-card-1">
                            <div class="card-header">
                                <h5> {{ $key + 1 }}. {{ $link->title }}</h5>
                            </div>

                            <div class="card-body">
                                <div>
                                    <p><strong>Category:</strong> {{ $link->category->name }} </p>
                                    <p><strong>Publishing date:</strong> {{ \Carbon\Carbon::parse( $link->date )->toFormattedDateString() }} </p>
                                    <p><strong>URL:</strong> {{ $link->url ? $link->url : 'N/A' }}</p>
                                </div>

                                <a class="btn btn-success btn-icon-split" href="{{ $link->url }}"
                                    target="_blank" {{ $link->url ? '' : 'disabled' }}>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Open link</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            No links Found
                        </div>
                    @endforelse
                </div>
            </div>
            {{ $links->links() }}
        </div>
    </section>
@endsection
