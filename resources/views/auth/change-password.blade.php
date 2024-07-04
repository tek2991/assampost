@extends('admin.layouts.app')
@section('title')
    {{ __('Manage / Edit downloads') }}
@endsection
@section('breadcrumb')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Change Password</h1>
</div>
@endsection
@section('content')
 <div class="row">
    @if(Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success">
                {{-- <i class="fe fe-check mr-2" aria-hidden="true"></i> --}}
                {!! Session::get('success') !!}
            </div>
        </div>
    </div>
    @endif


    @if(Session::has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                {{-- <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> --}}

                {!! Session::get('error') !!}
            </div>
        </div>
    </div>
    @endif


   @if(!empty($errors->all()))
   <div class="alert alert-danger">
       {{-- <strong><i class="fe fe-bell mr-2" aria-hidden="true"></i></strong>    --}}
       @foreach($errors->all() as $error)
           {{$error}}<br>
       @endforeach
   </div>
   @endif
<div class="container">
    <form action="{{ route('changePassword.update') }}" method="Post"  onSubmit="return LoginEncrypter(this)">
        @csrf
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 mb-8">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body">
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Current Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password" required>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">New Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password" required>
                                Your password must contain 6 characters, at least one uppercase letter, one lowercase letter and one number.
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Confirm Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password" required>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">&nbsp;</label>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        </div>


                </div>
            </div>
        </div>




        </div>





    </div>
    </form>
</div>
@php
$admin_login_crypt_change = md5(time().uniqid());
\Session::put('admin_login_crypt_change', $admin_login_crypt_change);
@endphp
@endsection

@section('scripts')
<script src="{{asset('assets/js/aes.js')}}"></script>
  <script src="{{asset('assets/js/aes-json-format.js')}}"></script>
  <script>
    LoginEncrypter = function(Obj){
        var current_password = CryptoJS.AES.encrypt($("#current_password").val(), "{{$admin_login_crypt_change}}", {format: CryptoJSAesJson}).toString();
        $("#current_password").val(current_password);
        var password = CryptoJS.AES.encrypt($("#password").val(), "{{$admin_login_crypt_change}}", {format: CryptoJSAesJson}).toString();
        $("#password").val(password);

        var password_confirmation = CryptoJS.AES.encrypt($("#password_confirmation").val(), "{{$admin_login_crypt_change}}", {format: CryptoJSAesJson}).toString();
        $("#password_confirmation").val(password_confirmation);
        return true;
    }
</script>
@endsection