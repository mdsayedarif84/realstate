<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Admin Login</title>
      <style>
        .page-content{
            background-image: url({{asset('upload/loginBack.jpg')}});
        }
          .authLogin-side-wrapper{
              width:100%;
              height:100%;
              background-image:url({{asset('upload/login.png')}});
            
          }
      </style>
    <!-- Fonts -->
    @include('admin.link.css')
  </head>
  <body id="bgPic">
    <div class="main-wrapper" >
      <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
          <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
              <div class="card">
                <div class="row">
                  <div class="col-md-4 pe-md-0">
                    <div class="authLogin-side-wrapper">

                    </div>
                  </div>
                  <div class="col-md-8 ps-md-0">
                    <div class="auth-form-wrapper px-4 py-5">
                      <a href="#" class="noble-ui-logo logo-light d-block mb-2">4<span>Tech</span></a>
                      <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                      <form class="forms-sample" method="POST" action="{{ route('customLogin') }}">
                          @csrf
                        <div class="mb-3">
                          <label for="login" class="form-label">Email/Name/Phone</label>
                          <input type="text" name="login" class="form-control" id="login" placeholder="login">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" autocomplete="current-password" placeholder="Password">
                        </div>
                        <div class="form-check mb-3">
                          <label for="remember_me" class="inline-flex items-center">
                              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                              <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                          </label>
                        </div>
                        <div>
                          <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                          @if (Route::has('password.request'))
                            <a type="button" href="{{ route('password.request') }}" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                              <i class="btn-icon-prepend" data-feather="twitter"></i>
                              {{ __('Forgot your password?') }}
                            </a>
                          @endif
                        </div>
                        <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.link.js')
  </body>
</html>