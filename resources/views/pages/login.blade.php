<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@section('title'){{env('APP_NAME')}}@show</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('theme/favicon.png') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
        <script src="{{ asset('theme/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100">
                    <div class="col-xl-4 col-lg-4 col-md-4 m-auto">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <img height="40" src="{{ asset('theme/img/logo.png') }}" alt="RADMIN" >
                            </div>
                            <p>Welcome back! </p>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{--
                              <div class="form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <i class="ik ik-user"></i>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            --}}
                                <div class="form-group">
                                    <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    <i class="ik ik-user"></i>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    <i class="ik ik-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @if($errors->any())
                                      <span class="invalid-feedback" style="display:block" role="alert">
                                          <strong>{{$errors->first()}}</strong>
                                      </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a class="btn text-danger" href="{{url('password/forget')}}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-custom">Sign In</button>
                                </div>
                                <div class="register">
                                    <p>{{ __('No account?')}} <a href="{{url('register')}}">{{ __('Sign Up')}}</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('theme/src/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/screenfull/dist/screenfull.js') }}"></script>

        <script src="{{ asset('theme/toastr.min.js')}}"></script>
        <script>
            @if (Session::has('info'))
                toastr["info"](`{{ str_replace('`', '\`', session('info')) }}`, "Info")
            @endif
            @if (Session::has('error'))
                toastr["error"](`{{str_replace('`', '\`', session('error')) }}`, "Error")
            @endif
            @if (Session::has('warning'))
                toastr["warning"](`{{ str_replace('`', '\`', session('warning')) }}`, "Warning")
            @endif
            @if (Session::has('success'))
                toastr["success"](`{{ str_replace('`', '\`', session('success')) }}`, "Success")
            @endif

            @if (count($errors) > 0)
                // Handle Lumen validation errors
                @foreach ($errors->all() as $error)
                    toastr["error"](`{{ str_replace('`', '\`', $error) }}`, "Error")
                @endforeach
            @endif
        </script>
    </body>
</html>
