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
                    <ul class="list-group">
                        @forelse ($links as $key => $link)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $key + 1 }}. {{ $link->title }} <i
                                        class="text-secondary">({{ $link->category->name }},
                                        {{ \Carbon\Carbon::parse($link->date)->toFormattedDateString() }})</i>
                                </span>
                                <span><a class="btn btn-success btn-sm" href="{{ $link->url ? $link->url : '#' }}"
                                        target="_blank" {{ $link->url ? '' : 'disabled' }}>
                                        <span class="text">Goto link</span>
                                    </a></span>
                            </li>
                        @empty
                            <li class="list-group-item">No items found!</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            {{ $links->links() }}
        </div>
    </section>
@endsection
