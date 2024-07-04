@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-4">
            <div class="login-form form-wrapper">	
								<form method="POST" action="{{ route('login') }}">
                                    @csrf
									<h4 class="color-primary-red text-center">Admin login</h4>
									<div class="row">
										<div class="col-md-12">
											<label for="validationDefault01">Username: </label>
											<input type="text" name="username" id="username" class="form-control" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>
                                    </div>
                                    <div class="row  mt-2">
										<div class="col-md-12">
											<label for="validationDefault01">Password: </label>
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                              @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                              @enderror   
                                        </div>
									</div>

                                    <div class="form-group  mt-2">        
									    <div class="row">
                                            <div class="col-md-12">
                                            <button class="submit-btn" type="submit">login</button>
                                            </div>
                                            <div class="col-md-12  mt-2">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                            </div>
									    </div>	
                                    </div>
								</form>
						</div>
        </div>
    </div>
</div>
@endsection
