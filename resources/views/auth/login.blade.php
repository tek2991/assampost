<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Postal admin login
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />
<style>
.invalid-feedback {
    /*display: none;*/
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
.is-invalid {
            border-color: #a94442 !important;
        }
</style>
</head>

<body class="bg-gray-200">
  
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" >
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                
                
                  <div class="row mt-3">
                    <div class="col-12 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <img src="{{asset('assets/img/logo-cms.png')}}">
                      </a>
                    </div>
                  </div>
                </div>
              
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" onSubmit="return LoginEncrypter(this)" autocomplete="off">
                @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="input-group input-group-outline mb-3">
                  
                    <p><img src="{!!captcha_src()!!}" alt="catcha" style="border:1px solid black;"></p>
                   
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Captcha</label>
                    <input id="captcha" required type="number" class="form-control" name="captcha"  autocomplete="off">
                    @if($errors->has('captcha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('captcha') }}</strong>
                        </span>
                    @endif
                  
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  @php
    $admin_login_crypt = md5(time().uniqid());
    \Session::put('admin_login_crypt', $admin_login_crypt);
  @endphp
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
  <script src="{{asset('assets/js/aes.js')}}"></script>
  <script src="{{asset('assets/js/aes-json-format.js')}}"></script>
  <script>
    LoginEncrypter = function(Obj){
        var encrypted_pass = CryptoJS.AES.encrypt($("#password").val(), "{{$admin_login_crypt}}", {format: CryptoJSAesJson}).toString();
        // var decrypted_pass = CryptoJS.AES.decrypt(encrypted_pass, "123456", {format: CryptoJSAesJson}).toString();
        // console.log(encrypted_pass);
        // console.log(decrypted_pass);
        console.log(encrypted_pass);
        $("#password").val(encrypted_pass);
        return true;
    }
</script>
</body>

</html>