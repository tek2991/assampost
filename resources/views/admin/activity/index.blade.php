@extends('admin.layouts.app')
@section('title')
    {{ __('Manage / Edit Events') }}
@endsection
@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Events</h1>
    </div>
@endsection
@section('content')
    <div class="row">
        @if (Session::has('success'))
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
                <div class="alert alert-danger">{{ $error }}</div>
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
                <th>Url</th>
                <th>Method</th>
                <th>IP Addr</th>
                <th>User Agent</th>
            </thead>
            <tbody>
                @forelse ($log_activities as $k=>$log_activitie)
                    <tr>
                        <td>{{ $log_activities->firstItem() + $k }}</td>
                        <td>{{ $log_activitie->subject }}</td>
                        <td>{{ $log_activitie->url }}</td>
                        <td>{{ $log_activitie->method }}</td>
                        <td>{{ $log_activitie->ip }}</td>
                        <td>{{ $log_activitie->agent }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Activity</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $log_activities->links() }}
@endsection
