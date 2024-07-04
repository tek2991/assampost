@extends('admin.layouts.app')
@section('title')
	{{ __('Banner Images') }}
@endsection
@section('breadcrumb')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Banner Images</h1>
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
		@foreach ($banners as $banner)
			<div class="col-md-3">
				<div class="card position-relative  py-3  border-left-danger">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
                                <img src="{{$banner->banner_image}}" class="img-fluid" alt="Banner Image">
							</div><br/>
							<p>URL: {{ $banner->url }}</p>
						</div>

						<div class="row">
							<div class="col-md-6">
								<a href="{{ route('admin.banner.edit',$banner->id)}}" class="btn btn-primary btn-block btn-sm"><i class="fa fa-edit"></i></a>
							</div>
							<div class="col-md-6">
								<form action="{{route('admin.banner.destroy',$banner->id)}}" method="Post">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger btn-block  btn-sm"
										onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
								</form>
							</div>
						</div>


					</div>
				</div>
			</div>
		@endforeach

	</div>

@endsection

<style>
p {
  margin-top: 7px !important;
  margin-bottom: 1rem;
  margin-left: 2rem !important;

</style>
