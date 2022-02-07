@extends('admin.layouts.app')
@section('title')
	{{ __('Edit Banner') }}
@endsection
@section('breadcrumb')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Banner</h1>
	</div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="card position-relative  py-3  border-left-danger">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Edit Banner</h6>
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
                    @if (session('status'))
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">
										<i class="fas fa-times"></i>
									</button>
									<span>{{ session('status') }}</span>
								</div>
							</div>
						</div>
					@endif
					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger">{{ $error }}</div>
						@endforeach
					@endif
					<form action="{{route('admin.banner.update',$banners->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Banner Image </label>
								</div>
								<div class="col-md-9">
									<input type="file" class="form-control" name="banner_image" id="banner_image" placeholder="Choose an Image">
								</div>
							</div>
						</div>
                        <div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">Add Url </label>
								</div>
								<div class="col-md-9">
									<input type="url" class="form-control" name="url" id="url"placeholder="https://example.com" value="{{$banners->url}}">
								</div>
							</div>
						</div>

						<div class="form-group" style="padding-top:10px;">
							<div class="row">
								<div class="col-md-12 text-center">
									<button type="submit" name="submit" class="btn btn-success btn-sm btn-icon-split">
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
